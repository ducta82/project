<?php

class Custom_Widget extends WP_Widget {
 
        function __construct() {
                parent::__construct (
                      'custom_Widget', 
                      'btn Widget', 
                 
                      array(
                          'description' => 'custom button widget' // mô tả
                      )
                    );
        }
 
        function form( $instance ) {
                parent::form( $instance );
 
                $default = array(
                        'title' => 'Tiêu đề widget',
                        'link'=>''
                );
         
                $instance = wp_parse_args( (array) $instance, $default);
         
                $title = esc_attr( $instance['title'] );
                $link = esc_attr( $instance['link'] );
         
                echo '<p> text btn <input type="text" class="widefat" name="'.$this->get_field_name('title').'" value="'.$title.'"/></p>';
                echo '<p>link btn <input type="text" class="widefat" name="'.$this->get_field_name('link').'" value="'.$link.'"/></p>';

        }
 
        function update( $new_instance, $old_instance ) {
                parent::update( $new_instance, $old_instance );
                $instance = $old_instance;
                $instance['title'] = strip_tags($new_instance['title']);
                $instance['link'] = strip_tags($new_instance['link']);
                return $instance;
        }

        function widget( $args, $instance ) {
                extract($args);
                $title = $instance['title'];
                $link = $instance['link'];
                $show_info = isset( $instance['show_info'] ) ? $instance['show_info'] : false;
                 
                echo $before_widget;
                if ( $link || $title  )
                echo '<a class="btn btn-widget" href="'.$link.'" role="button">'.$title.'</a>';
                echo $after_widget;
        }
 
}
?>