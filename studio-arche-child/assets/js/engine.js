/**
 * Studio Arche — Upgraded Core Animation Engine with Native Curtain Transitions
 * Powers: Custom native-curtain page transitions, Lenis smooth scroll, custom cursor,
 *         preloader, scroll reveals, parallax, magnetic buttons, 3D tilt, glassmorphic nav
 */

(function() {
  'use strict';

  // Register GSAP ScrollTrigger plugin
  if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
    gsap.registerPlugin(ScrollTrigger);
  }

  const SA = window.StudioArche = {};
  const isMobile = window.innerWidth <= 1024 || ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
  SA.isMobile = isMobile;

  let portfolioScrollTween = null;
  let portfolioScrollTrigger = null;

  // ============================================================================
  // 1. DOM INJECTION — Grain, Wires, Preloader, Cursor, Transitions
  // ============================================================================

  function injectGrain() {
    if (document.querySelector('.sa-grain')) return;
    const grain = document.createElement('div');
    grain.className = 'sa-grain';
    grain.setAttribute('aria-hidden', 'true');
    document.body.appendChild(grain);
  }

  function injectWires() {
    if (document.querySelector('.sa-wires')) return;
    const wires = document.createElement('div');
    wires.className = 'sa-wires';
    wires.setAttribute('aria-hidden', 'true');
    for (let i = 0; i < 5; i++) {
      wires.appendChild(document.createElement('span'));
    }
    document.body.appendChild(wires);
  }

  function injectPreloader() {
    const loader = document.createElement('div');
    loader.className = 'sa-preloader';
    loader.setAttribute('aria-hidden', 'true');
    loader.innerHTML = `
      <span class="sa-preloader__tag">ATELIER</span>
      <h1 class="sa-preloader__logo">STUDIO ARCHE</h1>
      <div class="sa-preloader__bar">
        <div class="sa-preloader__progress"></div>
      </div>
      <span class="sa-preloader__counter">0%</span>
    `;
    document.body.insertBefore(loader, document.body.firstChild);
    return loader;
  }

  function injectCursor() {
    if (isMobile || document.querySelector('.sa-cursor-dot')) return null;
    const dot = document.createElement('div');
    dot.className = 'sa-cursor-dot';
    const ring = document.createElement('div');
    ring.className = 'sa-cursor-ring';
    const label = document.createElement('div');
    label.className = 'sa-cursor-label';
    document.body.appendChild(dot);
    document.body.appendChild(ring);
    document.body.appendChild(label);
    return { dot, ring, label };
  }

  function injectTransitionOverlay() {
    let overlay = document.querySelector('.sa-transition-overlay');
    if (!overlay) {
      overlay = document.createElement('div');
      overlay.className = 'sa-transition-overlay';
      overlay.setAttribute('aria-hidden', 'true');
      for (let i = 0; i < 5; i++) {
        const col = document.createElement('div');
        col.className = 'sa-transition-overlay__col';
        overlay.appendChild(col);
      }
      document.body.appendChild(overlay);
    }
    return overlay;
  }

  // ============================================================================
  // 2. LENIS SMOOTH SCROLL
  // ============================================================================

  function initLenis() {
    if (isMobile || typeof Lenis === 'undefined') return null;

    if (SA.lenis) {
      SA.lenis.destroy();
    }

    const lenis = new Lenis({
      duration: 1.2,
      easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      orientation: 'vertical',
      gestureOrientation: 'vertical',
      smoothWheel: true,
      wheelMultiplier: 1,
      touchMultiplier: 2,
      infinite: false,
    });

    if (window.ScrollTrigger) {
      lenis.on('scroll', ScrollTrigger.update);
      gsap.ticker.add((time) => lenis.raf(time * 1000));
      gsap.ticker.lagSmoothing(0);
    } else {
      function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
      }
      requestAnimationFrame(raf);
    }

    SA.lenis = lenis;
    return lenis;
  }

  // ============================================================================
  // 3. PRELOADER TIMELINE
  // ============================================================================

  function playPreloader(loader, lenis) {
    if (!window.gsap || !loader) return Promise.resolve();

    return new Promise((resolve) => {
      if (lenis) lenis.stop();

      const counter = loader.querySelector('.sa-preloader__counter');
      const tl = gsap.timeline({
        onComplete: () => {
          if (lenis) lenis.start();
          loader.remove();
          resolve();
        }
      });

      let count = { val: 0 };
      tl.to(count, {
        val: 100,
        duration: 2,
        ease: 'power2.inOut',
        onUpdate: () => {
          if (counter) counter.textContent = Math.round(count.val) + '%';
        }
      }, 0);

      tl.to('.sa-preloader__tag', {
        opacity: 1, y: 0, duration: 0.6, ease: 'power3.out'
      }, 0.1)
      .to('.sa-preloader__logo', {
        opacity: 1, y: 0, duration: 0.8, ease: 'power3.out'
      }, 0.3)
      .to('.sa-preloader__counter', {
        opacity: 1, duration: 0.4
      }, 0.3)
      .to('.sa-preloader__progress', {
        width: '100%', duration: 1.6, ease: 'power3.inOut'
      }, 0.4)
      .to(['.sa-preloader__tag', '.sa-preloader__logo', '.sa-preloader__counter', '.sa-preloader__bar'], {
        opacity: 0, y: -30, duration: 0.5, ease: 'power3.in', stagger: 0.05
      }, '+=0.3')
      .to('.sa-preloader', {
        yPercent: -100, duration: 1, ease: 'power4.inOut'
      }, '-=0.2');
    });
  }

  // ============================================================================
  // 4. CUSTOM CURSOR
  // ============================================================================

  function initCursor(cursor) {
    if (!cursor && !isMobile) {
      cursor = {
        dot: document.querySelector('.sa-cursor-dot'),
        ring: document.querySelector('.sa-cursor-ring'),
        label: document.querySelector('.sa-cursor-label')
      };
    }
    if (!cursor || !cursor.dot || isMobile || !window.gsap) return;

    let mouse = { x: -100, y: -100 };
    let dotPos = { x: -100, y: -100 };
    let ringPos = { x: -100, y: -100 };

    window.removeEventListener('mousemove', onMouseMove);
    window.addEventListener('mousemove', onMouseMove);

    function onMouseMove(e) {
      mouse.x = e.clientX;
      mouse.y = e.clientY;
    }

    gsap.killTweensOf(cursor.dot);
    gsap.killTweensOf(cursor.ring);

    gsap.ticker.remove(cursorTicker);
    gsap.ticker.add(cursorTicker);

    function cursorTicker() {
      dotPos.x += (mouse.x - dotPos.x) * 0.35;
      dotPos.y += (mouse.y - dotPos.y) * 0.35;
      ringPos.x += (mouse.x - ringPos.x) * 0.12;
      ringPos.y += (mouse.y - ringPos.y) * 0.12;

      gsap.set(cursor.dot, { x: dotPos.x, y: dotPos.y });
      gsap.set(cursor.ring, { x: ringPos.x, y: ringPos.y });
      gsap.set(cursor.label, { x: ringPos.x, y: ringPos.y - 40 });
    }

    function bindCursorHovers() {
      const hoverTargets = document.querySelectorAll(
        'a, button, .sa-btn, .sa-link, .sa-img-wrap--hover, .sa-nav__link, .sa-nav__hamburger, .sa-filter-tab, .sa-accordion-header'
      );
      const actionTargets = document.querySelectorAll(
        '.sa-compare, .sa-img-wrap--hover, .sa-horizontal-slide__image'
      );
      const textTargets = document.querySelectorAll('input, textarea');

      hoverTargets.forEach(el => {
        if (el.dataset.cursorBound) return;
        el.dataset.cursorBound = '1';
        el.addEventListener('mouseenter', () => cursor.ring.classList.add('is-hovering'));
        el.addEventListener('mouseleave', () => {
          cursor.ring.classList.remove('is-hovering');
          cursor.ring.classList.remove('is-action');
          cursor.label.classList.remove('is-visible');
          cursor.label.textContent = '';
        });
      });

      actionTargets.forEach(el => {
        if (el.dataset.cursorActionBound) return;
        el.dataset.cursorActionBound = '1';
        const labelText = el.dataset.cursorLabel || '';
        el.addEventListener('mouseenter', () => {
          cursor.ring.classList.add('is-action');
          if (labelText) {
            cursor.label.textContent = labelText;
            cursor.label.classList.add('is-visible');
          }
        });
        el.addEventListener('mouseleave', () => {
          cursor.ring.classList.remove('is-action');
          cursor.label.classList.remove('is-visible');
        });
      });

      textTargets.forEach(el => {
        if (el.dataset.cursorTextBound) return;
        el.dataset.cursorTextBound = '1';
        el.addEventListener('mouseenter', () => cursor.ring.classList.add('is-text'));
        el.addEventListener('mouseleave', () => cursor.ring.classList.remove('is-text'));
      });
    }

    bindCursorHovers();
    SA.rebindCursor = bindCursorHovers;
  }

  // ============================================================================
  // 5. GLASSMORPHIC NAV HANDLER
  // ============================================================================

  function initNav() {
    const nav = document.querySelector('.sa-nav');
    const hamburger = document.querySelector('.sa-nav__hamburger');
    const overlay = document.querySelector('.sa-nav__overlay');
    const overlayLinks = document.querySelectorAll('.sa-nav__overlay-link');

    if (!nav) return;

    function onScroll() {
      const scrollY = window.scrollY || document.documentElement.scrollTop;
      if (scrollY > 50) {
        nav.classList.add('is-scrolled');
      } else {
        nav.classList.remove('is-scrolled');
      }
    }

    window.removeEventListener('scroll', onScroll);
    window.addEventListener('scroll', onScroll, { passive: true });
    
    if (SA.lenis) {
      SA.lenis.off('scroll', onScroll);
      SA.lenis.on('scroll', onScroll);
    }
    onScroll();

    if (hamburger && overlay) {
      const newHamburger = hamburger.cloneNode(true);
      hamburger.parentNode.replaceChild(newHamburger, hamburger);

      newHamburger.addEventListener('click', () => {
        const isOpen = newHamburger.classList.toggle('is-active');
        overlay.classList.toggle('is-open', isOpen);
        
        if (isOpen && window.gsap) {
          gsap.fromTo(overlayLinks, {
            opacity: 0, y: 40
          }, {
            opacity: 1, y: 0,
            duration: 0.6,
            stagger: 0.08,
            ease: 'power3.out',
            delay: 0.2
          });
          if (SA.lenis) SA.lenis.stop();
        } else {
          if (SA.lenis) SA.lenis.start();
        }
      });

      overlayLinks.forEach(link => {
        link.addEventListener('click', () => {
          newHamburger.classList.remove('is-active');
          overlay.classList.remove('is-open');
          if (SA.lenis) SA.lenis.start();
        });
      });
    }
  }

  // ============================================================================
  // 6. SCROLL-TRIGGERED TEXT REVEALS
  // ============================================================================

  function initTextReveals() {
    if (!window.gsap || !window.ScrollTrigger) return;

    document.querySelectorAll('[data-reveal="words"]').forEach(el => {
      if (el.dataset.revealBound) return;
      el.dataset.revealBound = '1';

      const html = el.innerHTML.trim();
      const parts = html.replace(/<br\s*\/?>/gi, ' <br> ').split(/\s+/);

      el.innerHTML = parts.map(part => {
        if (part.toLowerCase() === '<br>') {
          return '<br>';
        }
        return `<span class="sa-word"><span class="sa-word-inner">${part}</span></span>`;
      }).join(' ');

      const inners = el.querySelectorAll('.sa-word-inner');
      const isHero = el.classList.contains('sa-hero-heading') || el.classList.contains('sa-mega-heading');

      if (isHero) {
        gsap.set(inners, { yPercent: 110, opacity: 0 });
      } else {
        gsap.fromTo(inners, {
          yPercent: 110, opacity: 0
        }, {
          yPercent: 0, opacity: 1,
          duration: 1,
          stagger: 0.04,
          ease: 'power4.out',
          scrollTrigger: {
            trigger: el,
            start: 'top 85%',
            toggleActions: 'play none none none'
          }
        });
      }
    });

    document.querySelectorAll('[data-reveal="chars"]').forEach(el => {
      if (el.dataset.revealBound) return;
      el.dataset.revealBound = '1';

      const html = el.innerHTML.trim();
      const parts = html.replace(/<br\s*\/?>/gi, ' <br> ').split(/\s+/);

      el.innerHTML = parts.map(part => {
        if (part.toLowerCase() === '<br>') {
          return '<br>';
        }
        const chars = part.match(/&#?\w+;|./g) || [];
        return `<span class="sa-word">` + chars.map(char =>
          `<span class="sa-char">${char}</span>`
        ).join('') + `</span>`;
      }).join('<span style="display:inline-block;width:0.3em"></span>');

      const charEls = el.querySelectorAll('.sa-char');
      const isHero = el.classList.contains('sa-hero-heading') || el.classList.contains('sa-mega-heading');

      if (isHero) {
        gsap.set(charEls, { yPercent: 110, opacity: 0 });
      } else {
        gsap.fromTo(charEls, {
          yPercent: 110, opacity: 0
        }, {
          yPercent: 0, opacity: 1,
          duration: 0.8,
          stagger: 0.02,
          ease: 'power4.out',
          scrollTrigger: {
            trigger: el,
            start: 'top 85%',
            toggleActions: 'play none none none'
          }
        });
      }
    });

    document.querySelectorAll('[data-reveal="fade"]').forEach(el => {
      if (el.dataset.revealBound) return;
      el.dataset.revealBound = '1';

      gsap.fromTo(el, {
        y: 60, opacity: 0
      }, {
        y: 0, opacity: 1,
        duration: 1,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: el,
          start: 'top 88%',
          toggleActions: 'play none none none'
        }
      });
    });

    document.querySelectorAll('[data-reveal="stagger"]').forEach(parent => {
      if (parent.dataset.revealBound) return;
      parent.dataset.revealBound = '1';

      const children = parent.children;

      gsap.fromTo(children, {
        y: 50, opacity: 0
      }, {
        y: 0, opacity: 1,
        duration: 0.8,
        stagger: 0.12,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: parent,
          start: 'top 85%',
          toggleActions: 'play none none none'
        }
      });
    });

    document.querySelectorAll('[data-reveal="line"]').forEach(el => {
      if (el.dataset.revealBound) return;
      el.dataset.revealBound = '1';

      gsap.fromTo(el, {
        width: 0
      }, {
        width: el.dataset.lineWidth || '100%',
        duration: 1.2,
        ease: 'power3.inOut',
        scrollTrigger: {
          trigger: el,
          start: 'top 90%',
          toggleActions: 'play none none none'
        }
      });
    });
  }

  SA.animateHeroHeadings = function() {
    if (!window.gsap) return;
    const heroes = document.querySelectorAll('.sa-hero-heading, .sa-mega-heading');
    heroes.forEach(el => {
      const charEls = el.querySelectorAll('.sa-char');
      const inners = el.querySelectorAll('.sa-word-inner');
      const targets = charEls.length > 0 ? charEls : inners;

      if (targets.length === 0) return;

      gsap.killTweensOf(targets);
      gsap.fromTo(targets, {
        yPercent: 110, opacity: 0
      }, {
        yPercent: 0, opacity: 1,
        duration: charEls.length > 0 ? 0.8 : 1.0,
        stagger: charEls.length > 0 ? 0.02 : 0.04,
        ease: 'power4.out',
        overwrite: 'auto'
      });
    });
  };

  // ============================================================================
  // 7. PARALLAX IMAGES
  // ============================================================================

  function initParallax() {
    if (isMobile || !window.gsap || !window.ScrollTrigger) return;

    document.querySelectorAll('[data-parallax]').forEach(wrapper => {
      if (wrapper.dataset.parallaxBound) return;
      wrapper.dataset.parallaxBound = '1';

      const speed = parseFloat(wrapper.dataset.parallax) || 20;
      const img = wrapper.querySelector('img');
      if (!img) return;

      wrapper.style.overflow = 'hidden';
      img.style.height = (100 + speed * 2) + '%';
      img.style.objectFit = 'cover';
      img.style.width = '100%';

      gsap.fromTo(img, {
        yPercent: -speed
      }, {
        yPercent: speed,
        ease: 'none',
        scrollTrigger: {
          trigger: wrapper,
          start: 'top bottom',
          end: 'bottom top',
          scrub: true
        }
      });
    });
  }

  // ============================================================================
  // 8. MAGNETIC BUTTONS
  // ============================================================================

  function initMagneticButtons() {
    if (isMobile || !window.gsap) return;

    document.querySelectorAll('[data-magnetic]').forEach(btn => {
      if (btn.dataset.magneticBound) return;
      btn.dataset.magneticBound = '1';

      const strength = parseFloat(btn.dataset.magnetic) || 0.3;

      btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        gsap.to(btn, {
          x: x * strength,
          y: y * strength,
          duration: 0.3,
          ease: 'power2.out'
        });
      });

      btn.addEventListener('mouseleave', () => {
        gsap.to(btn, {
          x: 0, y: 0,
          duration: 0.7,
          ease: 'elastic.out(1, 0.4)'
        });
      });
    });
  }

  // ============================================================================
  // 9. 3D TILT CARDS
  // ============================================================================

  function initTiltCards() {
    if (isMobile || !window.gsap) return;

    document.querySelectorAll('[data-tilt]').forEach(card => {
      if (card.dataset.tiltBound) return;
      card.dataset.tiltBound = '1';

      const intensity = parseFloat(card.dataset.tilt) || 8;
      card.style.transformStyle = 'preserve-3d';

      card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top) / rect.height - 0.5;

        gsap.to(card, {
          rotateX: -y * intensity,
          rotateY: x * intensity,
          duration: 0.4,
          ease: 'power2.out',
          transformPerspective: 1000
        });
      });

      card.addEventListener('mouseleave', () => {
        gsap.to(card, {
          rotateX: 0, rotateY: 0,
          duration: 0.8,
          ease: 'elastic.out(1, 0.3)'
        });
      });
    });
  }

  // ============================================================================
  // 10. BEFORE/AFTER SLIDER
  // ============================================================================

  function initCompareSliders() {
    document.querySelectorAll('.sa-compare').forEach(slider => {
      if (slider.dataset.compareBound) return;
      slider.dataset.compareBound = '1';

      const afterEl = slider.querySelector('.sa-compare__after');
      const handle = slider.querySelector('.sa-compare__handle');
      if (!afterEl || !handle) return;

      let isDragging = false;

      function updatePosition(clientX) {
        const rect = slider.getBoundingClientRect();
        let x = (clientX - rect.left) / rect.width;
        x = Math.max(0.05, Math.min(0.95, x));
        const pct = x * 100;
        afterEl.style.clipPath = `polygon(0 0, ${pct}% 0, ${pct}% 100%, 0 100%)`;
        handle.style.left = pct + '%';
      }

      slider.addEventListener('mousedown', (e) => { isDragging = true; updatePosition(e.clientX); });
      slider.addEventListener('touchstart', (e) => { isDragging = true; updatePosition(e.touches[0].clientX); }, { passive: true });

      window.addEventListener('mousemove', (e) => { if (isDragging) updatePosition(e.clientX); });
      window.addEventListener('touchmove', (e) => { if (isDragging) updatePosition(e.touches[0].clientX); }, { passive: true });

      window.addEventListener('mouseup', () => isDragging = false);
      window.addEventListener('touchend', () => isDragging = false);
    });
  }

  // ============================================================================
  // 11. COUNTER ANIMATION
  // ============================================================================

  SA.animateCounters = function() {
    if (!window.gsap || !window.ScrollTrigger) return;

    document.querySelectorAll('[data-count]').forEach(el => {
      if (el.dataset.countBound) return;
      el.dataset.countBound = '1';

      const target = parseInt(el.dataset.count, 10);
      const suffix = el.dataset.countSuffix || '';
      const prefix = el.dataset.countPrefix || '';
      const counter = { val: 0 };

      gsap.to(counter, {
        val: target,
        duration: 2,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: el,
          start: 'top 85%',
          toggleActions: 'play none none none'
        },
        onUpdate: () => {
          el.textContent = prefix + Math.round(counter.val) + suffix;
        }
      });
    });
  };

  // ============================================================================
  // 12. MARQUEE
  // ============================================================================

  function initMarquee() {
    document.querySelectorAll('.sa-marquee__track').forEach(track => {
      if (track.dataset.marqueeBound) return;
      track.dataset.marqueeBound = '1';

      const items = Array.from(track.children);
      items.forEach(item => {
        const clone = item.cloneNode(true);
        track.appendChild(clone);
      });
    });
  }

  // ============================================================================
  // 13. PAGE-SPECIFIC INITIALIZERS (ACCORDIONS, HORIZONTAL PORTFOLIOS, FORMS)
  // ============================================================================

  // --- SERVICES Accordion & Process Steps ---
  function initPageServices() {
    const accordionItems = document.querySelectorAll('[data-accordion-item]');
    const track = document.querySelector('.sa-process-track');

    if (accordionItems.length > 0 && window.gsap) {
      accordionItems.forEach((item, index) => {
        const body = item.querySelector('.sa-accordion-body');
        const header = item.querySelector('.sa-accordion-header');

        if (item.classList.contains('is-active')) {
          gsap.set(body, { height: 'auto' });
          header.setAttribute('aria-expanded', 'true');
          body.setAttribute('aria-hidden', 'false');
        } else {
          gsap.set(body, { height: 0 });
          header.setAttribute('aria-expanded', 'false');
          body.setAttribute('aria-hidden', 'true');
        }

        const newHeader = header.cloneNode(true);
        header.parentNode.replaceChild(newHeader, header);

        newHeader.addEventListener('click', (e) => {
          e.preventDefault();
          const isActive = item.classList.contains('is-active');

          accordionItems.forEach(otherItem => {
            if (otherItem !== item && otherItem.classList.contains('is-active')) {
              closeAccordionItem(otherItem);
            }
          });

          if (isActive) {
            closeAccordionItem(item);
          } else {
            openAccordionItem(item);
          }
        });
      });
    }

    if (track && window.gsap && window.ScrollTrigger) {
      ScrollTrigger.create({
        trigger: track,
        start: 'top 75%',
        onEnter: () => {
          track.classList.add('is-visible');
        }
      });

      const steps = track.querySelectorAll('.sa-process-step');
      gsap.fromTo(steps,
        { y: 40, opacity: 0 },
        {
          y: 0,
          opacity: 1,
          duration: 0.8,
          stagger: 0.15,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: track,
            start: 'top 80%',
            toggleActions: 'play none none none'
          }
        }
      );
    }
  }

  function openAccordionItem(item) {
    const body = item.querySelector('.sa-accordion-body');
    const header = item.querySelector('.sa-accordion-header');
    item.classList.add('is-active');
    header.setAttribute('aria-expanded', 'true');
    body.setAttribute('aria-hidden', 'false');
    gsap.killTweensOf(body);
    gsap.fromTo(body, { height: 0 }, {
      height: 'auto',
      duration: 0.6,
      ease: 'power3.out',
      onComplete: () => { if (window.ScrollTrigger) ScrollTrigger.refresh(); }
    });
    const img = body.querySelector('img');
    if (img) gsap.fromTo(img, { scale: 1.15, yPercent: -5 }, { scale: 1, yPercent: 0, duration: 0.8, ease: 'power2.out' });
  }

  function closeAccordionItem(item) {
    const body = item.querySelector('.sa-accordion-body');
    const header = item.querySelector('.sa-accordion-header');
    item.classList.remove('is-active');
    header.setAttribute('aria-expanded', 'false');
    body.setAttribute('aria-hidden', 'true');
    gsap.killTweensOf(body);
    gsap.to(body, {
      height: 0,
      duration: 0.5,
      ease: 'power3.inOut',
      onComplete: () => { if (window.ScrollTrigger) ScrollTrigger.refresh(); }
    });
  }

  // --- PORTFOLIO Horizontal scroll Pinning & Category Filtering ---
  function initPagePortfolio() {
    const section = document.querySelector('.sa-horizontal-section');
    const pinContainer = document.querySelector('.sa-horizontal-pin');
    const progressBar = document.querySelector('.sa-horizontal-progress');
    const progressBarInner = document.querySelector('.sa-horizontal-progress__bar');
    const filters = document.querySelectorAll('.sa-filter-tab');
    const slides = document.querySelectorAll('.sa-horizontal-slide');

    portfolioScrollTween = null;
    portfolioScrollTrigger = null;

    if (section && pinContainer && window.gsap && window.ScrollTrigger && window.innerWidth > 768) {
      const getScrollAmount = () => {
        const activeSlides = pinContainer.querySelectorAll('.sa-horizontal-slide:not(.is-filtered-out)');
        let totalWidth = 0;
        activeSlides.forEach(slide => { totalWidth += slide.offsetWidth; });
        const gap = parseFloat(window.getComputedStyle(pinContainer).gap) || 0;
        totalWidth += gap * (activeSlides.length - 1);
        const paddingLeft = parseFloat(window.getComputedStyle(pinContainer).paddingLeft) || 0;
        const paddingRight = parseFloat(window.getComputedStyle(pinContainer).paddingRight) || 0;
        totalWidth += paddingLeft + paddingRight;
        return -(totalWidth - window.innerWidth);
      };

      portfolioScrollTween = gsap.to(pinContainer, {
        x: getScrollAmount,
        ease: 'none',
        scrollTrigger: {
          trigger: section,
          pin: pinContainer,
          scrub: 1,
          start: 'top top',
          end: () => '+=' + Math.abs(getScrollAmount()),
          invalidateOnRefresh: true,
          onUpdate: (self) => {
            if (progressBarInner) progressBarInner.style.width = (self.progress * 100) + '%';
          },
          onToggle: (self) => {
            if (progressBar) {
              if (self.isActive) progressBar.classList.add('is-visible');
              else progressBar.classList.remove('is-visible');
            }
          }
        }
      });
      portfolioScrollTrigger = portfolioScrollTween.scrollTrigger;
    }

    if (filters.length > 0 && slides.length > 0) {
      filters.forEach(filter => {
        const newFilter = filter.cloneNode(true);
        filter.parentNode.replaceChild(newFilter, filter);

        newFilter.addEventListener('click', (e) => {
          e.preventDefault();
          const category = newFilter.dataset.filter;
          if (newFilter.classList.contains('is-active')) return;

          document.querySelectorAll('.sa-filter-tab').forEach(btn => btn.classList.remove('is-active'));
          newFilter.classList.add('is-active');

          gsap.to(slides, {
            opacity: 0, scale: 0.9, y: 20, duration: 0.4, stagger: 0.05, ease: 'power2.inOut',
            onComplete: () => {
              slides.forEach(slide => {
                const slideCat = slide.dataset.category;
                if (category === 'all' || slideCat === category) {
                  slide.classList.remove('is-filtered-out');
                  slide.style.display = 'block';
                } else {
                  slide.classList.add('is-filtered-out');
                  slide.style.display = 'none';
                }
              });

              if (SA.lenis) {
                SA.lenis.scrollTo('#portfolio-gallery', { offset: 0, duration: 0.6, immediate: true });
              } else {
                const rect = section.getBoundingClientRect();
                window.scrollTo({ top: window.scrollY + rect.top, behavior: 'auto' });
              }

              if (window.ScrollTrigger) ScrollTrigger.refresh();

              if (portfolioScrollTween && window.innerWidth > 768) {
                gsap.set(pinContainer, { x: 0 });
                portfolioScrollTrigger.scroll(portfolioScrollTrigger.start);
              }

              const activeSlides = Array.from(slides).filter(slide => !slide.classList.contains('is-filtered-out'));
              gsap.fromTo(activeSlides,
                { opacity: 0, scale: 0.95, y: 30 },
                {
                  opacity: 1, scale: 1, y: 0, duration: 0.6, stagger: 0.08, ease: 'power3.out', delay: 0.1,
                  onComplete: () => { if (window.ScrollTrigger) ScrollTrigger.refresh(); }
                }
              );
            }
          });
        });
      });
    }
  }

  // --- CONTACT Floating Labels & Validation ---
  function initPageContact() {
    const inputs = document.querySelectorAll('.sa-form-input');
    const form = document.getElementById('saContactForm');

    if (inputs.length > 0) {
      setTimeout(() => {
        inputs.forEach(input => {
          if (input.value && input.value.trim() !== '') input.classList.add('is-filled');
        });
      }, 100);

      inputs.forEach(input => {
        if (input.dataset.labelBound) return;
        input.dataset.labelBound = '1';

        input.addEventListener('focus', () => input.classList.add('is-filled'));
        input.addEventListener('blur', () => {
          if (!input.value || input.value.trim() === '') input.classList.remove('is-filled');
        });
        input.addEventListener('change', () => {
          if (input.value && input.value.trim() !== '') input.classList.add('is-filled');
          else input.classList.remove('is-filled');
        });
      });
    }

    if (form) {
      if (form.dataset.contactBound) return;
      form.dataset.contactBound = '1';

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        let isFormValid = true;

        const nameInput = form.querySelector('#saName');
        const emailInput = form.querySelector('#saEmail');
        const projectType = form.querySelector('#saProjectType');
        const messageInput = form.querySelector('#saMessage');

        form.querySelectorAll('.sa-form-group').forEach(g => {
          g.classList.remove('has-error');
          const err = g.querySelector('.sa-form-error');
          if (err) err.textContent = '';
        });

        if (!nameInput.value || nameInput.value.trim() === '') { showError(nameInput, 'Full name is required'); isFormValid = false; }
        if (!emailInput.value || emailInput.value.trim() === '') { showError(emailInput, 'Email address is required'); isFormValid = false; }
        else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) { showError(emailInput, 'Please enter a valid email address'); isFormValid = false; }
        if (!projectType.value || projectType.value === '') { showError(projectType, 'Please select a project type'); isFormValid = false; }
        if (!messageInput.value || messageInput.value.trim() === '') { showError(messageInput, 'Please share a brief message about your vision'); isFormValid = false; }

        if (isFormValid) {
          const submitBtn = form.querySelector('button[type="submit"]');
          const btnText = submitBtn.querySelector('span');
          gsap.to(submitBtn, { scale: 0.95, opacity: 0.8, duration: 0.3 });
          if (btnText) btnText.textContent = 'Sending...';

          setTimeout(() => {
            gsap.to(form, {
              opacity: 0, y: -20, duration: 0.6, ease: 'power3.inOut',
              onComplete: () => {
                form.style.display = 'none';
                const successContainer = document.getElementById('saFormSuccess');
                if (successContainer) {
                  successContainer.style.display = 'block';
                  successContainer.classList.add('is-visible');
                  const successIcon = successContainer.querySelector('.sa-form-success__icon');
                  const successHeading = successContainer.querySelector('.sa-section-heading');
                  const successBody = successContainer.querySelector('.sa-body-lg');
                  gsap.fromTo([successIcon, successHeading, successBody],
                    { opacity: 0, y: 30 },
                    { opacity: 1, y: 0, duration: 0.8, stagger: 0.12, ease: 'power3.out', delay: 0.1 }
                  );
                }
              }
            });
          }, 1500);
        }
      });
    }
  }

  function showError(input, message) {
    const group = input.closest('.sa-form-group');
    if (!group) return;
    group.classList.add('has-error');
    const errorEl = group.querySelector('.sa-form-error');
    if (errorEl) errorEl.textContent = message;
    if (window.gsap) gsap.fromTo(group, { x: -10 }, { x: 0, duration: 0.5, ease: 'elastic.out(1, 0.3)' });
  }

  // ============================================================================
  // 14. SEAMLESS AJAX CURTAIN WIPE TRANSITIONS
  // ============================================================================

  function updateNavActiveLink(url) {
    const parsedUrl = new URL(url);
    const path = parsedUrl.pathname;
    const navLinks = document.querySelectorAll('.sa-nav__link, .sa-nav__overlay-link');
    navLinks.forEach(link => {
      const linkHref = link.getAttribute('href');
      if (!linkHref) return;
      const linkUrl = new URL(linkHref, window.location.origin);
      if (linkUrl.pathname === path) {
        link.classList.add('is-active');
      } else {
        link.classList.remove('is-active');
      }
    });
  }

  async function navigateToPage(url) {
    const overlay = injectTransitionOverlay();
    const cols = overlay.querySelectorAll('.sa-transition-overlay__col');
    const currentContent = document.querySelector('.sa-page-content');

    if (!window.gsap || cols.length === 0 || !currentContent) {
      window.location.href = url;
      return;
    }

    // Freeze mouse activity & scroll
    document.body.style.pointerEvents = 'none';
    if (SA.lenis) SA.lenis.stop();

    // Start curtains closing
    const tlLeave = gsap.timeline();
    tlLeave.to(cols, {
      scaleY: 1,
      transformOrigin: 'bottom',
      duration: 0.6,
      stagger: 0.05,
      ease: 'power3.inOut'
    }, 0)
    .to(currentContent, {
      opacity: 0,
      y: -30,
      duration: 0.4,
      ease: 'power2.in'
    }, 0);

    try {
      // Parallel fetch with cache-busting headers to prevent caching issues
      const response = await fetch(url, {
        headers: { 'Cache-Control': 'no-cache', 'Pragma': 'no-cache' }
      });
      if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
      const htmlText = await response.text();

      // Wait for curtains to fully close
      await tlLeave;

      // Parse document
      const parser = new DOMParser();
      const newDoc = parser.parseFromString(htmlText, 'text/html');
      const newContent = newDoc.querySelector('.sa-page-content');

      if (!newContent) {
        window.location.href = url;
        return;
      }

      // Kill all old ScrollTriggers to prevent memory leaks and duplicate bindings
      if (window.ScrollTrigger) {
        ScrollTrigger.getAll().forEach(t => t.kill());
      }

      // Update metadata & body classes dynamically (critical for template colors)
      document.title = newDoc.title;
      document.body.className = newDoc.body.className;

      // Swap DOM contents
      currentContent.parentNode.replaceChild(newContent, currentContent);

      // Scroll to top instantly
      window.scrollTo(0, 0);
      if (SA.lenis) SA.lenis.scrollTo(0, { immediate: true });

      // Update browser history (only if navigating to a new URL)
      if (window.location.href !== url) {
        history.pushState(null, '', url);
      }

      // Update active nav links classes
      updateNavActiveLink(url);

      // Re-initialize all scripts on the new DOM
      if (SA.refresh) {
        SA.refresh();
      }

      // Force ScrollTrigger to refresh
      if (window.ScrollTrigger) {
        ScrollTrigger.clearScrollMemory();
        ScrollTrigger.refresh(true);
      }

      // Curtain opens reveal
      const newCols = document.querySelectorAll('.sa-transition-overlay__col');
      const tlEnter = gsap.timeline({
        onComplete: () => {
          document.body.style.pointerEvents = 'all';
          if (SA.lenis) SA.lenis.start();
        }
      });

      tlEnter.set(newCols, { scaleY: 1 })
      .to(newCols, {
        scaleY: 0,
        transformOrigin: 'top',
        duration: 0.6,
        stagger: 0.05,
        ease: 'power3.inOut'
      }, 0.2)
      .fromTo('.sa-page-content', 
        { opacity: 0, y: 30 },
        { opacity: 1, y: 0, duration: 0.6, ease: 'power3.out' },
        0.4
      )
      .add(() => {
        if (SA.animateHeroHeadings) SA.animateHeroHeadings();
      }, 0.4);

    } catch (err) {
      console.error('AJAX page transition failed, falling back to native load:', err);
      window.location.href = url;
    }
  }

  function initPageTransitions() {
    document.body.addEventListener('click', (e) => {
      const link = e.target.closest('a');
      if (!link) return;

      const href = link.getAttribute('href');
      if (!href) return;

      const isInternal = href.startsWith('/') || href.startsWith(window.location.origin) || (href.indexOf(':') === -1 && !href.startsWith('#'));
      const isSpecial = href.includes('wp-admin') || href.includes('wp-login') || href.startsWith('#') || link.getAttribute('target') === '_blank' || href.endsWith('.pdf') || href.endsWith('.zip');

      if (isInternal && !isSpecial) {
        e.preventDefault();
        const targetUrl = new URL(href, window.location.origin).href;

        if (targetUrl === window.location.href) {
          if (SA.lenis) SA.lenis.scrollTo(0, { duration: 1.2 });
          else window.scrollTo({ top: 0, behavior: 'smooth' });
          return;
        }

        navigateToPage(targetUrl);
      }
    });

    // Support browser back/forward buttons seamlessly!
    window.removeEventListener('popstate', onPopState);
    window.addEventListener('popstate', onPopState);

    function onPopState() {
      navigateToPage(window.location.href);
    }
  }

  // ============================================================================
  // INITIALIZATION
  // ============================================================================

  document.addEventListener('DOMContentLoaded', async function() {
    // 1. Check if we navigated via transition
    const isTransitioning = sessionStorage.getItem('sa-transitioning') === '1';
    SA.isTransitioning = isTransitioning;

    // 2. Inject structural visual layers
    injectGrain();
    injectWires();
    
    const overlay = injectTransitionOverlay();
    const cols = overlay.querySelectorAll('.sa-transition-overlay__col');
    const cursor = injectCursor();
    const lenis = initLenis();

    if (isTransitioning) {
      // Instantly render the curtains closed (prevents flash of raw new content)
      gsap.set(cols, { scaleY: 1 });
      sessionStorage.removeItem('sa-transitioning');

      // Instantly start scrolling & skip long preloader on page swaps
      if (lenis) lenis.start();

      // Bind all dynamic assets instantly
      initCursor(cursor);
      initNav();
      initTextReveals();
      initParallax();
      initMagneticButtons();
      initTiltCards();
      initCompareSliders();
      initMarquee();
      SA.animateCounters();
      
      initPageServices();
      initPagePortfolio();
      initPageContact();
      initPageTransitions();

      // Curtain opens reveal
      const tl = gsap.timeline({
        onComplete: () => {
          document.body.style.pointerEvents = 'all';
        }
      });
      tl.to(cols, {
        scaleY: 0,
        transformOrigin: 'top',
        duration: 0.6,
        stagger: 0.05,
        ease: 'power3.inOut'
      }, 0.2)
      .fromTo('.sa-page-content', 
        { opacity: 0, y: 30 },
        { opacity: 1, y: 0, duration: 0.6, ease: 'power3.out' },
        0.4
      )
      .add(() => {
        SA.animateHeroHeadings();
      }, 0.4);

    } else {
      // Standard visit (first time land): run all initializers instantly under preloader
      initCursor(cursor);
      initNav();
      initTextReveals();
      initParallax();
      initMagneticButtons();
      initTiltCards();
      initCompareSliders();
      initMarquee();
      SA.animateCounters();

      initPageServices();
      initPagePortfolio();
      initPageContact();
      initPageTransitions();

      // Play preloader counter timeline
      const loader = injectPreloader();
      await playPreloader(loader, lenis);

      // Animate hero headings immediately after preloader finishes
      SA.animateHeroHeadings();

      // Force ScrollTrigger to refresh once preloader is fully gone
      if (window.ScrollTrigger) {
        ScrollTrigger.refresh();
      }
    }

    if (window.ScrollTrigger) {
      window.addEventListener('load', () => {
        setTimeout(() => ScrollTrigger.refresh(), 500);
      });
    }

    SA.refresh = function() {
      initTextReveals();
      SA.animateHeroHeadings();
      initParallax();
      initMagneticButtons();
      initTiltCards();
      initCompareSliders();
      initMarquee();
      SA.animateCounters();
      
      initPageServices();
      initPagePortfolio();
      initPageContact();
      initNav();

      if (cursor) initCursor(cursor);
      if (window.ScrollTrigger) ScrollTrigger.refresh();
    };
  });

})();
