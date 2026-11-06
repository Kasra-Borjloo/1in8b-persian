# 1 in 8 Billion (Persian Edition) - یک در هشت میلیارد

> **The fully interactive, complete, and live version is available online at:**  
> ### 🌐 [https://www.kasraborjloo.xyz/](https://www.kasraborjloo.xyz/)

---

## 📖 About The Project

This is a complete, fluent Persian localization and self-contained offline implementation of the renowned life simulation project **"1 in 8 Billion" (1in8b.life)**.

The simulation accurately models human lifespans, births, historical events, relations, education, and careers across **172 countries and territories** based on official data from the United Nations, World Bank, WHO, and UNICEF.

[راهنمای فارسی (Persian Documentation)](./README_FA.md)

---

## 🌟 Key Features

- **100% Fluent Persian Translation**: All events, decisions, scenarios, dialogues, character names, and UI elements are translated into natural Persian.
- **Vazirmatn Typography**: Integrated with the standard, elegant [Vazirmatn](https://github.com/rastikerdar/vazirmatn) Persian font for clear readability across all devices.
- **Unlocked Special Features**: Free access to all previously paid passes, memorials, village decorations, and custom packs.
- **Offline & Self-Contained**: Can be launched locally without third-party tracking, external CDNs, or remote dependencies.
- **Integrated Backend**: Includes a lightweight backend (`api/index.php`) and `.htaccess` rewrite rules to handle memorial and village endpoints smoothly.

---

## 🚀 Running Locally

To run the local version on your machine:

### Option 1: Python HTTP Server (Quick & Lightweight)
Open your terminal inside this repository folder and run:
```bash
python -m http.server 8080
```
Then visit: [http://localhost:8080](http://localhost:8080)

### Option 2: Node.js Serve
```bash
npx serve .
```

### Option 3: VS Code Live Server
Right-click on `index.html` and click **"Open with Live Server"**.

---

## 📂 Repository Structure

- `index.html`: Main interactive life simulation application
- `a/`: Core stylesheet and localized Persian game engine (`fa.b72de6b259.js`)
- `fonts/`: Self-hosted fonts, including Vazirmatn webfonts
- `fa/`: Subpages (About, Educational guides for teachers, 172 detailed country statistics, and story books)
- `api/`: Lightweight PHP backend providing data endpoints and simulated token features
- `.htaccess`: Server configuration, clean URL rewriting, and directory indexing protections

---

## 👤 Author & Maintainer

- **Kasra Borjloo**
- **Live Website**: [https://www.kasraborjloo.xyz/](https://www.kasraborjloo.xyz/)
- **GitHub**: [@Kasra-Borjloo](https://github.com/Kasra-Borjloo)
