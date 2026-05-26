# Developer Setup Guide: STUDIO ARCHE

Welcome! This setup guide will walk you through spinning up your local environment, installing core themes/plugins, activating our custom Luxury CSS design system, and preparing the structural pages for **STUDIO ARCHE** (Minimal Architecture & Luxury Interiors).

---

## Phase 1: Local Environment & WordPress Setup

We recommend using **Local WP** (by WP Engine). It is the easiest, cleanest, and most modern tool for local WordPress development on Windows.

### Steps to Spin Up Your Site:
1. **Download Local WP:**
   * Go to [localwp.com](https://localwp.com/) and download the free installer for Windows.
   * Run the installer and open Local WP.
2. **Create a New Site:**
   * Click the **`+` (Add Local Site)** button in the bottom left.
   * Select **Create a new site** and click **Continue**.
   * Set your Site Name to: `Studio Arche`.
   * Under **Advanced Options**, you can leave them as default (it will create `studio-arche.local`). Click **Continue**.
   * Select **Preferred** environment settings (PHP 8.x, Nginx or Apache, MySQL 8.x) and click **Continue**.
   * Set your WordPress Admin username and password (e.g., username: `admin`, password: `password123`) and click **Add Site**.
3. **Locate your Site Folder:**
   * Once the site is created, click the **Go to Site Folder** link or look at your path. It will typically be located at `C:\Users\YourUsername\Local Sites\studio-arche`.
   * The actual WordPress files live inside `\app\public\`.

---

## Phase 2: Theme & Plugin Integration

Now, let's configure your WordPress canvas with our lightweight parent theme, custom child theme, and free modular plugins.

### Step 1: Install the Hello Elementor Parent Theme
1. Open your Local WP dashboard and click **WP Admin** on your Studio Arche site.
2. Log in using the administrator credentials you set up.
3. In the left navigation, go to **Appearance > Themes**.
4. Click **Add New Theme** at the top.
5. In the search bar on the right, type `Hello Elementor`.
6. Click **Install**, and once installed, click **Activate**. (Do NOT use default themes like Twenty Twenty-Four).

### Step 2: Activate the Studio Arche Child Theme
To link our custom Luxury CSS system and functions to your site:
1. Go to your local explorer and locate our workspace folder: `c:\Users\Aadinadh S M\Downloads\wordpress\studio-arche-child`.
2. Zip this `studio-arche-child` folder (right-click -> **Compress to ZIP file** on Windows). Name it `studio-arche-child.zip`.
3. In your WordPress Admin dashboard, go to **Appearance > Themes > Add New Theme**.
4. Click the **Upload Theme** button at the top.
5. Choose your `studio-arche-child.zip` file and click **Install Now**.
6. Once uploaded successfully, click **Activate**!
   * *Why?* This enqueues our custom luxury variables, fluid type layouts, editorial cards, line buttons, and safe SVG upload hooks automatically.

### Step 3: Install Free Performance & Elementor Plugins
We want to keep our site highly optimized, loading in under 1 second. We will install only **four** lightweight, free utility plugins:
1. In your WordPress Admin dashboard, go to **Plugins > Add New Plugin**.
2. Search and install the following plugins:
   * **Elementor** (The core page builder canvas).
   * **Elementor Header & Footer Builder** (By Brainstorm Force - lets us build highly customized minimalist headers/footers for free!).
   * **SVG Support** (Enables SVG vector file management, although our child theme already handles the backend, this provides media library preview grids).
   * **Contact Form 7** or **WPForms** (We will use WPForms Lite for a highly responsive, clean contact form).
3. Activate all of them.

---

## Phase 4: Site Architecture & Navigation Setup

Let's build the structural bones of our editorial interior design site.

### Step 1: Create the 6 Pages
1. Go to **Pages > Add New Page** in your WordPress Admin dashboard.
2. Title the first page: `Home`.
3. Look at the right-hand panel:
   * Under **Page Attributes > Template**, select **Elementor Full Width**. (This removes the default theme headers/sidebars, giving us a clean premium screen to design on).
4. Click **Publish** on the top right.
5. Repeat this exact process to create the remaining 5 pages:
   * `About` (Template: Elementor Full Width)
   * `Services` (Template: Elementor Full Width)
   * `Portfolio` (Template: Elementor Full Width)
   * `Testimonials` (Template: Elementor Full Width)
   * `Contact` (Template: Elementor Full Width)

### Step 2: Configure Static Homepage & Permalinks
WordPress by default treats the home page as a blog feed. We must route it to our beautiful custom homepage and set clean, SEO-friendly URLs.
1. In the WP Admin dashboard, go to **Settings > Reading**.
2. Under **Your homepage displays**, select **A static page**.
3. For **Homepage**, select **Home** from the dropdown menu. Leave the posts page blank.
4. Click **Save Changes** at the bottom.
5. Now, go to **Settings > Permalinks**.
6. Under **Common Settings**, select **Post name** (e.g., `http://studio-arche.local/about/`).
7. Click **Save Changes** at the bottom.

### Step 3: Create the Minimalist Header & Footer Menus
1. Go to **Appearance > Menus** in your WP Admin dashboard.
2. Under **Menu Name**, type `Primary Navigation` and click **Create Menu**.
3. In the left panel under **Pages**, check the boxes for `Home`, `About`, `Services`, `Portfolio`, `Testimonials`, and `Contact`.
4. Click **Add to Menu**.
5. Arrange them in order by dragging.
6. Under **Display location**, check **Header** (if available) or **Primary Menu**. Click **Save Menu**.

---

## Summary of Core Technical Setup

Your site is now powered by our custom child theme styling system! 

Every time you build inside Elementor, you can now use our **luxury custom utility classes** (like `.arche-btn-outline`, `.arche-subtitle-caps`, `.arche-stats-grid`, `.arche-luxury-card`, etc.) in the **Advanced > CSS Classes** field of any Elementor widget to immediately dress it with premium custom styles, custom layouts, and hover transitions.

*Next, proceed to `c:\Users\Aadinadh S M\Downloads\wordpress\page-blueprints\` to examine the visual layouts and configurations for each of our 6 pages.*
