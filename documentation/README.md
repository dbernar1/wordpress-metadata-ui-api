WordPress Fields UI API Documentation
=====================================

# Background

This project's original scope was to provide an API for adding form UI elements for post metadata. Currently in core, there is a simplistic UI for editing custom fields: a meta box on the Edit Post screen with textareas for each field's contents. This shows how unopinionated core has been in regards to metadata. From a developer's perspective, getter and setter functions exist with basic sanitization and authorization and that's it.

# Research

This unopinionated respect for metadata is a good thing. It's opened up a vacuum for third-party libraries to fill, and experiment with different code architectural implementations. We've researched these libraries to take insight from their experience.

These libraries include: [Custom Metadata Manager](https://github.com/Automattic/custom-metadata), [Pods](http://wordpress.org/plugins/pods/), [Custom Metaboxes and Fields](https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress), [Humanmade’s Custom Meta Boxes](https://github.com/humanmade/Custom-Meta-Boxes), [WPAlchemy](https://github.com/farinspace/wpalchemy), [Advanced Custom Fields (ACF)](http://wordpress.org/plugins/advanced-custom-fields/), [Custom Field Suite](http://wordpress.org/plugins/custom-field-suite/), [Types](http://wordpress.org/plugins/types/), [FieldManager](http://fieldmanager.org/), [Super CPT](https://github.com/mboynes/super-cpt), [Easy Custom Fields](http://wordpress.org/plugins/easy-custom-fields/), [WordPress Settings API Class](https://github.com/tareq1988/wordpress-settings-api-class), [piklist](http://wordpress.org/plugins/piklist/), [Option Tree](https://github.com/valendesigns/option-tree), [vafpress-framework](http://vafpress.com/vafpress-framework/), [wp-forms](https://github.com/jbrinley/wp-forms), [Sunrise](https://bitbucket.org/newclarity/sunrise-1), [Advanced Post Manager](http://wordpress.org/plugins/advanced-post-manager/), [Themosis](http://www.themosis.com/), [oik-fields](http://www.oik-plugins.com/oik-plugins/oik-fields-custom-post-type-field-apis/), [Tax-Meta-Class](https://github.com/bainternet/Tax-Meta-Class), [MetaBox](https://github.com/rilwis/meta-box), [KC Settings](http://wordpress.org/plugins/kc-settings/), [Developers Custom Fields](http://wordpress.org/plugins/developers-custom-fields/), [Simple Fields](http://wordpress.org/plugins/simple-fields/), [Nmwdhj](http://wordpress.org/plugins/momtaz-nmwdhj/), [BMoney Custom Meta Boxes](http://briandichiara.com/code/custom-meta-boxes/), [WordPress Extend (WPX)](https://bitbucket.org/alkah3st/wp-extend), [WordPress-Cuztom-Helper](https://github.com/Gizburdt/Wordpress-Cuztom-Helper).

We invited authors of these libraries to present an overview over Google Hangout of their library and anything of note that came up architecturally in development. All these can be found in [a Youtube playlist](https://www.youtube.com/playlist?list=PL3VvzYmI35PD9tDw0WlHYNoe7DVd4nfal).

We also wrote up architectural overviews of these, so we could compare architecture at a glance rather than diving into code. [WordPress Extend (WPX)](postmeta-library-architectural-reviews/wp-extend.md)


