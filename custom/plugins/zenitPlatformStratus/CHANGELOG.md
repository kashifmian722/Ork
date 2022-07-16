# 1.2.4
- Optimization - Improvements for the display of data sheets on mobile devices
- Optimization - Improvement of the display of the manufacturer link if no link is set in the manufacturer
- Optimization - Refactoring of the plugin bootstrap
- Optimization - Refactoring of the plugin configuration ID for compatibility with the Shopware Cloud
- Optimization - Refactoring of breadcrumb and category image management for compatibility with the Shopware Cloud

# 1.2.3
- Feature - store data sheets in the product and display them as a tab
- Optimization - Improves the display of the scroll navigation with a dark body background using the CMS Extensions plugin
- Optimization - Small improvements of the custom fields
- Optimization - Minor fixes in the theme configuration
- Optimization - Refactoring of the variable zenplugin to zenconfig based on its semantic meaning
- Optimization - Preparation for wishlist implementation
- Bugfix - Prevents the tab navigation from being covered by the negative margin of the product slider

# 1.2.2
- Bugfix - Number of products per row was lost when pagining
- Optimization - Corrects the display of the vertical alignment of cross-selling product sliders

# 1.2.1
- Optimization - Improvement of the representation of the search by input groups
- Optimization - Improvement of the product box shadow for product sliders
- Optimization - Corrects the configuration for the vertical alignment of shopping experience elements
- Compatibility - Compatibility with our Font Change Plugin
- Bugfix - Optimized the display of the newsletter input in larger fonts
- Bugfix - Configurator option label text color with dark shop background color

# 1.2.0
- Feature - Implementation of a selection of Google fonts as local theme fonts for easy data protection-compliant use without external embedding.
- Feature - New configuration to select theme-fonts.
- Feature - New configuration to toggle the collapsible element to be open by default on mobile devices.
- Feature - New configuration to set number of products per row in listings for each viewport/device.
- Feature - New configuration to enable or disable variant characteristics on product boxes.
- Optimization - Improvements in the theme.json 
- Optimization - Added some twig-blocks in base.html.twig for better customization.  
- Optimization - Adjust line-height of product-box product-description
- Optimization - Revision of the help texts for custom code

# 1.1.4
- Feature - Code Editor in Plugin configuration for custom code fields
- Optimization - Positioning of centered breadcrumbs if header absolute and full width header mode
- Optimization - Disabled button contrast
- Optimization - Appearance product configurator option label with rounded borders
- Optimization - Revision of the product card image display mode image
- Optimization - Revision of the category image configuration

# 1.1.3
- Bugfix - Display of breadcrumbs on the detail page at SW 6.3.4.0

# 1.1.2
- Optimization - Positioning of the Suggest search results
- Optimization - Prevents elements from being superimposed on the product image
- Optimization - Calculation of additional body paddings for cookie banners only with default ad
- Optimization - Administration module injects repositoryFactory insted of theme-mixin
- Compatibility - Improvement of the compatibility of the icon.html.twig
- Compatibility - Hide thumbs and dots when having too many product images - SW 6.3.4.0

# 1.1.1
- Optimization - Revision of the event to hide the preloader
- Optimization - Revision of the product card image display modes in listings
- Optimization - Prevents jumping of product-actions between transition-states in listings
- Optimization - Prevents the background color of the article images from flashing on detail pages
- Optimization - moved DOM .page-wrapper
- Optimization - Width of Flyout Menu improved
- Bugfix - Quickview Cart Button - PageController can't be requested via XmlHttpRequest.

# 1.1.0
- Feature - New configuration for controlling the footer columns on tablet and desktop devices
- Optimization - Improvement of the display in certain combinations of settings
- Optimization - Width of the extended menu in boxed mode
- Optimization - Product Slider Gutter can be set by configuring the card spacing. This gives all grids the same spacing.
- Optimization - Revision of the header combinations with regard to the display of the Offcanvas Navigation Button
- Optimization - Vertical alignment of text and icon in the header shopping cart button
- Optimization - Revision of the sticky header function
- Optimization - Suggest search results scrollable
- Bugfix - Horizontal scrolling through expandable search in relation to header mode full-width-boxed fixed
- Bugfix - Deaktivieren der Tooltips auf Geräten mit Toucheingabe

# 1.0.5
- Optimization - Improvement Lighthouse Report: font-display: swap implemented for font embedding
- Optimization - Further improvements of the accessibility of the Lighthouse Report
- Optimization - Improved display of the images in cross-selling
- Bugfix - Close button of the overlay search carried out the search after entering a search string, if the Nutter decided not to carry out a search.
- Bugfix - header-main in sticky mode in combination with the hide option covered elements

# 1.0.4
- Optimization - Revision of the header display for single header, standard search, center logo and off-canvas main navigation XS-MD and XS-LG
- Optimization - Positioning of the centered logo when displaying elements above the header, e.g. Conversion banner
- Optimization - Improvement of the sticky header with absolute positioning
- Optimization - Improvement of the sticky header animation with single-line header and hide option
- Optimization - Improvement of the sticky header calculation in Javascript in connection with the hide option
- Compatibility - Absolutely positioned headers no longer cover conversion bars and other elements above the header
- Bugfix - Prevent escaping html on quickview description and manufacturer descripption in manufacturer tab

# 1.0.3
- Optimization - Revision of footer paddings on boxed layouts
- Optimization - Revision of header overlay mode on shopping experiences
- Optimization - Revision of expandable search on different layout styles
- Feature - Header overlay mode on shopping experiences on background-color independent of a category image
- Bugfix - paddings on breadcrumbs on Boxed Layout
- Bugfix - Quickview price align
- Bugfix - Product actions not visible after sorting

# 1.0.2
- Optimization - Revision of the Main Navigation Hovers
- Optimierung - Revision of the quickview icon
- Optimierung - Revision of header with multi lined, logo left, search default
- Bugfix - Details page mobile tab-menu
- Bugfix - Collapsible top bar initial state

# 1.0.1
- Feature - added content animations for shoppping experiences (more about this in the documentation).
- Compatibility - Improved compatibility when placing the flyout menu in fullwidth mode
- Optimizations - Smaller optimizations of designations in the configuration

# 1.0.0
- Initial plugin release
