<?php

class WP_Toc_Lite_Core{
    public function __construct() {
        add_filter( 'the_content', array( $this, 'add_ids_to_headings' ) );
        add_shortcode( 'wp-seo-toc', array( $this, 'wp_custom_table_of_contents' ) );
    }

    function filter_tag( $html ){
        $start = strpos( $html, '<' ) + 1;
        $end = strpos( $html, '>' );
        
        $tag = substr( $html, $start, $end - $start );
        return $tag;
    }

    function add_ids_to_headings( $content ) {
        // Check if we are on a blog post page
        if ( is_single() ) {
            $pattern = '/<h([2-6])(.*?)>(.*?)<\/h[2-6]>/i';
            // Find all h2 to h6 tags and add an ID based on their contents
            $content = '<div class="seo-content-wrapper">' . preg_replace_callback(
                $pattern,
                function( $matches ) {
    
                    $heading_level = $matches[1];
                    $heading_attributes = $matches[2];
                    $heading_text = $matches[3];
                    
                    // Generate a valid ID from the heading text
                    $id = sanitize_title( $heading_text );
    
                    // Add the ID attribute to the heading tag
                    $heading_tag = "<h{$heading_level}{$heading_attributes} id=\"{$id}\">{$heading_text}</h{$heading_level}>";
    
                    return $heading_tag;
                },
                $content
            ).'</div>';
        }
        return $content;
    }

    function toc_hide_post( $post_id ) {
        return false;
    }

    function wp_custom_table_of_contents( $atts ) {
        global $post;
        $post_id = $post->ID;

        ob_start();
        
        if ( ! $this->toc_hide_post( $post_id ) ){

            $atts = shortcode_atts( array(
                'class' => 'custom_table_of_contents_container',
            ), $atts, 'wp-seo-toc' );

            $content = $post->post_content;

            preg_match_all( '/<h([2-6])(.*?)>(.*?)<\/h\1>/', $content, $matches );

            ?>
            <nav class="custom_toc_wrapper">
                <details id="seo-toc-details" open>
                    <summary id="seo-toc-header" style="font-size:20px;">
                        Table Of Contents 
                        <span class="arrow">⌄</span>
                    </summary>

                    <ul class="<?php $atts['class'] ?>" >
                        <?php
                        foreach ( $matches[0] as $match ) {
                            preg_match( '/<h([2-6])(.*?)>(.*?)<\/h\1>/', $match, $title );

                            $tag = $this->filter_tag( $title[0] );
                            $title = trim( $title[3] );
                            $slug = sanitize_title( $title );

                            if ( isset( $slug ) and ! empty( $slug ) ){
                                echo '<li class="the--' . $tag . '">
                                        <a href="#' . $slug . '">' . $title . '</a>
                                    </li>';
                            }
                        } ?>
                    </ul>
                </details>
            </nav>

            <?php
            return ob_get_clean();
        }
    }
}

new WP_Toc_Lite_Core();
