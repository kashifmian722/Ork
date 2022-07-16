# 1.2.4
- Optimierung - Verbesserungen für die Anzeige von Datenblättern auf Mobilgeräten
- Optimierung - Verbesserung der Anzeige des Herstellerlinks, wenn im Hersteller kein Link gesetzt ist
- Optimierung - Refaktorierung der Plugin-Bootstrap
- Optimierung - Refaktorierung der Plugin-Konfigurations-ID für die Kompatibilität mit der Shopware Cloud
- Optimierung - Refaktorierung des Breadcrumb- und Kategorie-Image-Managements für die Kompatibilität mit der Shopware Cloud

# 1.2.3
- Feature - Datenblätter im Produkt hinterlegen und als Tab anzeigen
- Optimierung - Verbessert die Darstellung der Scroll-Navigation bei dunklem Body-Hintergrund Verbindung mit dem Plugin CMS-Extension
- Optimierung - Kleinere Verbesserungen der Custom Fields
- Optimierung - Kleinere Ausbesserungen in der Theme-Konfiguration  
- Optimierung - Refaktorierung der Variable zenplugin zu zenconfig auf Grund ihrer semantischen Bedeutung
- Optimierung - Vorbereitung für Wishlist Implementierung 
- Bugfix - Verhindert, dass die Tab-Navigation durch das negative Margin des Produkt-Sliders überdeckt werden kann

# 1.2.2
- Bugfix - Anzahl an Produkten pro Reihe ging beim Paginieren verloren
- Optimierung - Korrigiert die Darstellung der vertikalen Ausrichtung von Cross-Selling Produktslidern

# 1.2.1
- Optimierung - Verbesserung der Darstellung der Suche durch Input-Groups
- Optimierung - Verbesserung des Produkt-Box Schattens bei Produkt-Slidern
- Optimierung - Korrigiert die Darstellungsoption zur vertikalen Ausrichtung von Erlebniswelten-Elementen
- Kompatibilität - Kompatibilität mit unserem Font Change Plugin
- Bugfix - Optimiert die Darstellung des Newsletter-Inputs bei größerer Schrift
- Bugfix - Konfigurator Option Label Textfarbe bei dunkler Shop-Hintergrundfarbe

# 1.2.0
- Feature - Implementierung einer Auswahl von Google-Fonts als lokale Theme Schriften zur einfachen datenschutzkonformen Nutzung ohne externe Einbettung.
- Feature - Neue Konfiguration zur Auswahl der Theme-Schriftarten.
- Feature - Neue Konfiguration zum Umschalten der ein- und ausklappbaren Footer Spalten, sodass diese auf Mobilgeräten standardmäßig geöffnet sind.
- Feature - Neue Konfiguration um die Anzahl der Produkte pro Zeile im Listing für jeden Viewport/Gerät festzulegen.
- Feature - Neue Konfiguration zum Aktivieren oder Deaktivieren von wesentlichen Merkmalen auf Produktboxen.
- Optimierung - Verbesserungen in der theme.json
- Optimierung - Zur besseren Anpassbarkeit wurden in base.html.twig einige Twig-Blöcke hinzugefügt.
- Optimierung - Verbesserung der line-height der Produktbeschreibungen in Produktboxen
- Optimierung - Überarbeitung der Hilfetexte für Custom Code

# 1.1.4
- Feature - Code Editor in der Plugin-Konfiguration für Custom Code
- Optimierung - Positionierung der zentrierten Breadcrumbs im Header-Modus absolute und volle Breite
- Optimierung - Disabled Buttons Kontrast optimiert
- Optimierung - Erscheinungsbild des Produktkonfigurators mit abgerundeten Rändern verbessert
- Optimierung - Überarbeitung der Produkt-Box Big Image Bilddarstellung
- Optimierung - Überarbeitung der Kategoriebild-Steuerung

# 1.1.3
- Bugfix - Darstellung der Breadcrumbs auf der Detailseite bei SW 6.3.4.0

# 1.1.2
- Optimierung - Positionierung der Suggest Suchergebnisse
- Optimierung - Verhindert das Überlagern des Produktbildes von Elementen
- Optimierung - Berechnung zusätzlichen Body Paddings für Cookie Banner nur bei Default-Anzeige
- Optimierung - Administration Modul injects repositoryFactory anstatt des theme Mixins
- Kompatibilität - Verbesserung der Kompatibilität der icon.html.twig
- Kompatibilität - Verstecke Thumbnails und Dot-Navigation bei zu vielen Produktbildern - SW 6.3.4.0

# 1.1.1
- Optimierung - Überarbeitung des Events zum Ausblenden des Preloaders
- Optimierung - Überarbeitung der Produkt-Kachel Bilder Anzeigemodi im Listing
- Optimierung - Verhindert das Springen der Produkt-Actions zwischen den Transition-states im Listing
- Optimierung - Verhindert das Durchblitzen der Hintergrundfarbe der Artikelbilder auf Detailseiten
- Optimierung - DOM .page-wrapper verschoben
- Optimierung - Breite des Flyout Menüs verbessert
- Bugfix - Quickview Cart Button - PageController can't be requested via XmlHttpRequest.

# 1.1.0
- Feature -  Neue Konfiguration zur Steuerung der Footer Spalten auf Tablet- und Desktop-Geräten
- Optimierung - Verbesserung der Darstellung in bestimmten Einstellungs-Kombinationen
- Optimierung - Breite des Erweiterten Menüs im Boxed Modus
- Optimierung - Product Slider Gutter über Konfiguration der Cards Abstände setzbar. Dadurch erhalten alle Grids dieselben Abstände.
- Optimierung - Überarbeitung der Header Kombinationen in Bezug auf die Darstellung des Offcanvas Navigation Buttons
- Optimierung - Vertikale Ausrichtung von Text und Icon im Header Warenkorb Button
- Optimierung - Überarbeitung der Sticky Header Funktion
- Optimierung - Suggest Suchergebnisse scrollbar
- Bugfix - Horizontales Scrollen durch Ausklappbare Suche in Verbindung mit Header Modus Full-width-boxed behoben
- Bugfix - Deavtivating toltips on touch-devices

# 1.0.5
- Optimierung - Verbesserung Lighthouse Report: font-display: swap zur Schrifteinbettung implementiert
- Optimierung - Weitere Verbesserungen der Accessibility des Lighthouse Report
- Optimierung - Verbesserte Darstellung der Bilder im Crossselling
- Bugfix - Schließen Button der Overlay-Suche hat nach Eingabe eines Suchstrings die Suche ausgeführt, wenn der Nutter sich dazu entschieden hat, doch keine Suche durchzuführen.
- Bugfix - header-main im sticky mode in Kombination mit der hide-Option überdeckte Elemente

# 1.0.4
- Optimierung - Überarbeitung der Header Darstellung für Single Header, Standard Suche, Logo mittig und Offcanvas Main Navigation XS-MD und XS-LG
- Optimierung - Positionierung des zentrierten Logos bei Darstellung von Elementen über dem Header, z.B. Conversion Banner
- Optimierung - Verbesserung des Sticky Headers bei absoluter Positionierung
- Optimierung - Verbesserung der Sticky Header Animation bei einzeiligem Header und hide-Option
- Optimierung - Verbesserung der Sticky Header Berechnung im Javascript in Verbindung mit der hide-Option
- Kompatibilität - Absolut positionierte Header überdecken nun keine Conversion-Leisten und andere Elemente über dem Header
- Bugfix - Verhindert das Escapen von HTML der Quickview Beschreibung und Hersteller Beschreibung im Hersteller Tab

# 1.0.3
- Optimierung - Überarbeitung der Footer Paddings im Boxed Layout
- Optimierung - Überarbeitung der ausklappbaren Suche in verschiedenen Header Styles
- Optimierung - Überarbeitung der Header Erlebniswelt Überlagerung
- Feature - Header Erlebniswelt Ünberlagerung auch auf Hintergrundfarbe unabhängig eines Kategorie-Bildes
- Bugfix - Abstände der Breadcrumbs im Boxed Layout
- Bugfix - Quickview Preisausrichtung
- Bugfix - Product-Actions nach Sortierung nicht sichtbar

# 1.0.2
- Optimierung - Überarbeitung der Main Navigation Hovers
- Optimierung - Überarbeitung des Quickview Icons
- Optimierung - Überarbeitung des Header mit mehrzeiligem Header, Logo links, Suche Standard
- Bugfix - Detailseite mobile Tab-Menü
- Bugfix - Einklappbare Top Bar initialer Zustand

# 1.0.1
- Feature - Content Animationen für Erlebniswelten hinzugefügt. (mehr dazu in der Doku)
- Kompatibilität - Verbesserung der Kompatibilität bei Platzierung des Flyout Menü im Fullwidth-Modus
- Optimierungen - Kleinere Optimierungen von Bezeichnungen in der Konfiguration

# 1.0.0
- Initial plugin release
