<?php

/*
 * Securly allow the shortcode [pdf] to be used in custom displays
 */ 
 
 add_filter( 'frm_display_entry_content', 'FP_Custom_Display::entries_content', 10, 6 );
 
 
 class FP_Custom_Display
 {
		private static function format_attrs($attrs)
		{
			$attr_return = array();
			$attr_array = explode(' ', trim($attrs));	

			foreach($attr_array as $attr)
			{
				if(strlen($attr) > 0 && strpos($attr, '=') !== false)
				{
					$attr_block = explode('=', $attr);				
					$key = sanitize_key( $attr_block[0] );
					$val = str_replace('"', '', str_replace("'", '', $attr_block[1]));
					$attr_return[$key] = sanitize_text_field( $val );
				}
			}
			
			return $attr_return;
		}
		
		public static function entries_content($new_content, $entry, $shortcodes, $display, $show, $odd)
		{						
			/*
			 * Get the form/entry ID
			 */
			 $form_id = $entry->form_id;
			 $lead_id = $entry->id;
			 
			/*
			 * Do a search for our specific shortcode
			 */
			 $pdf_shortcode_search = preg_match_all('/\[pdf( (.+?))?\]((.+?)\[\/pdf\])?/', $new_content, $results);
			 
			 if($pdf_shortcode_search !== false)
			 {				 					 
					/*
					 * We have a match
					 * Loop through the results and generate the correct link
					 */ 
					 foreach($results[0] as $key => $string)
					 {
						$template = '';
						$download = '';
						$language = '';
						$text = '';
						 
						/*
						 * Check if any attributes are avaliable
						 */ 
						 if(strlen($results[1][$key]) > 0)
						 {						
							$attrs = self::format_attrs($results[1][$key]);
							$template = isset($attrs['template']) ? basename( sanitize_file_name( $attrs['template'] ) ) : '';
							$download = isset($attrs['download']) ? $attrs['download'] : '';
							$language = isset($attrs['language']) ? sanitize_text_field( $attrs['language'] ) : '';
						 }
						 
						 /*
						  * Check if there is defined URL text
						  */ 
						  if(strlen($results[4][$key]) > 0)
						  {
								$text = wp_kses_post( $results[4][$key] );
						  }
						 								 
						 
						 if($template === '')
						 {
							 global $fppdf;

							 $template = $fppdf->get_template($form_id);
							 if ( empty( $template ) || substr( $template, -4 ) !== '.php' ) {
								$template = FPPDFGenerator::$default['template'];
							 }
						 }
						 
						 if($text === '')
						 {
							$text = esc_html__( 'View PDF', 'ffpdf' );
						 }
						 
						 $nonce = wp_create_nonce('fppdf_' . $form_id . $lead_id. $template);																 
						 
						 /*
						  * Build URL 
						  */
						  $query = array(
							'pdf'      => 1,
							'fid'      => (int) $form_id,
							'lid'      => (int) $lead_id,
							'template' => $template,
							'nonce'    => $nonce,
						  );

						  if ( $download !== '' && $download !== '0' ) {
							$query['download'] = 1;
						  }

						  if ( $language !== '' ) {
							$query['lang'] = $language;
						  }

						  $href = add_query_arg( $query, site_url( '/' ) );
						  $url = '<a href="' . esc_url( $href ) . '">' . $text . '</a>';
						  
						  $new_content = str_replace($string, $url, $new_content);
					 }
			 }
			 
			 			 
			 return $new_content;	 
			
		}
 }
