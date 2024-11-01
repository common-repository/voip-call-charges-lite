<?php
	/**
	 * @package Whatsappmessenger
	 */
	class Voipcallcharges_widget extends WP_Widget {
		
		function __construct() {
			parent::__construct(
				'voip_call_charges_widget',
				__( 'Voip Call Charges Widget' , 'voip-charges'),
				array( 'description' => __( 'Display the voip charges calculator' , 'voip-charges') )
			);
			add_action( 'wp_head', array( 'Voipcallcharges_widget', 'css' ) );
		}

		function form( $instance ) {
			if ( $instance ) {
				$title = $instance['title'];
			    $textarea = esc_textarea($instance['textarea']);
			}
			else {
				$title = __( '' , 'voipcallcharges');
				$textarea = '';
				
			}
	?>

			<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:' , 'voip-call-charges'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			<label for="<?php echo $this->get_field_id('textarea'); ?>"><?php _e('Footer code:', 'voip-call-charges'); ?></label>
			<textarea class="widefat" id="<?php echo $this->get_field_id('textarea'); ?>" name="<?php echo $this->get_field_name('textarea'); ?>"><?php echo $textarea; ?></textarea>
				<?php echo plugins_url( 'myscript.js', __FILE__ ); ?>
			</p>

	<?php
		}
		
		function update( $new_instance, $old_instance ) {
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['textarea'] = $new_instance['textarea'];
			return $instance;
		}
		function css(){
			?>

			<style type="text/css">
			.code{
				color:rgb(186, 186, 186); margin-left:10px;
			}
			#voip-main-area {
				border: 1px solid #d0e0e6;
				background-color: #ecf7fc;
				margin: auto!important;
				padding: 22px 27px;
				-webkit-border-radius: 12px;
				-moz-border-radius: 12px;
				border-radius: 12px;
				position: relative;
				min-width:482px;
				max-width:550px;
			}

			#search-country-area {
				margin: 0 auto; min-height:153px;
			}
			.voip-left{
				float:left; width:67%; text-align:left; height:30px; line-height: 18px; font-size:16px; color:#4e4e4e; padding-left:6%; font-weight:normal!important;
			}
			.voip-right{
				float:left; width:26%; text-align:left; height:30px; line-height: 18px; font-size:16px; color:#4e4e4e; font-weight:normal!important;
			}
			#search-country-form {
				margin: 0 auto;
				width: 482px;
			}
			.field-row.search-country-string {
				position:relative;
				width: 482px;
				height: 58px;
				background: url('<?php echo plugins_url( 'search-country.png', __FILE__ ); ?>') no-repeat;
			}
			#search-country-rates {
				margin-top: 24px;
			}
			#search-country-rates .from {
				color: green;
				font-size: 22px;
				font-weight: bold;
				text-align: center;
			}
			.voip-clear{
				width:100%; height:auto; clear:both;
			}
			#search-country-rates .result {
				font: 18px Arial; 
			}
			.result{
				margin-top:10px!important;
			}
			.btn.icon.search {
			width: 24px;
			height: 24px;
			background: url('<?php echo plugins_url( 'search.png', __FILE__ ); ?>') no-repeat;
			}
			#search-country-rates .hr.separator {
				margin-top: 15px;
				margin-bottom: 20px;
			}
			#search-country-area .btns-area {
				margin: 15px auto 12px auto;
				width: 482px;
				height: 34px;
			}
			#search-country-area .btns-area.get-viber-out-wrapper {
				width: 170px;
			}
			#search-country-form .search.btn {
				position: absolute;
				left: 440px;
				top: 17px;
			}
			
			.field-row.search-country-string input {
				position: relative;
				width: 80%;
				top: 8px;
				font-size: 21px;
				background-color: #FFFFFF;
				left: 10px;
				border: none;
				font-family: Arial;
			}
			#search-country-results {
				display:none;
				position: absolute;
				min-width: 348px;
				margin: 45px 0 0 15px;
				z-index: 100;
				font-family: Arial;
			}
			#search-country-results ul.ui-autocomplete {
				box-sizing: content-box;
				width: 12em;
				max-height: 20em;
				padding: 0;
				margin: 0;
				overflow: auto;
				overflow-x: hidden;
				border: 1px solid #a4a7a7;
				z-index: 1;
				top: -5px;
				left: 0px;
				display: block;
				position: relative;
				width: 418px;
				background:white;
				font-family: Arial;
			}
			#search-country-results ul li {
				cursor: pointer;
				margin: 4px;
				padding: 2px 5px 3px 5px;
				color: #626262;
				white-space: nowrap;
				list-style: none;
				font-family: Arial;
			}
			.flags {
				background-image: url('<?php echo plugins_url( 'flags.png', __FILE__ ); ?>');
				background-repeat: no-repeat;
				float: left;
				height: 23px;
				width: 27px;
			}
			#search_country{
				border:none!important;
			}
			.flags.ua {
				background-position: 0px -5327px;
			}
			.nonlink{
				text-decoration:none!important;
			}
			.nonlink:hover;{
				color:white!important;
			}
			#search-country-results ul li a{
				color: inherit;
			}
			#search-country-results ul li a:hover{
				color: white;
			}
			#search-country-results ul li .country {
				font-size: 18px;
			}
			#search-country-results ul li .country:hover {
				color:white!important;
			}
			#search-country-results ul li:hover{
				background:green!important; color:white!important;
			}
			@media screen and (max-width:600px){
				.entry-content{
					min-width:auto!important;
					max-width:auto!important;
				}
				#search-country-form {
					margin: 0 auto;
					width: 100%!important;
				}
				.field-row.search-country-string {
					position:relative;
					width: 100%;
					height: 47px;
					background:white no-repeat;
					-webkit-border-radius: 5px;
					border-radius: 5px;
					-webkit-box-shadow: 0 0 4px 4px rgba(222,222,222,1);
					box-shadow: 0 0 4px 4px rgba(222,222,222,1);
					border:1px solid rgb(130, 122, 122);
				}
				#search-country-form .search.btn {
					position: absolute;
					right: 17px;
					left:90%;
					top: 11px;
				}
				#voip-main-area {
					border: 1px solid #d0e0e6;
					background-color: #ecf7fc;
					margin: auto!important;
					padding: 7px 10px;
					min-width:200px!important;
				}
				.field-row.search-country-string input {
					position: relative;
					width: 80%;
					top: 8px;
					font-size:16px;
				}
				#search-country-results ul.ui-autocomplete {
					width: 70%!important;
				}
				.voip-left{
					float:left; width:70%; text-align:left; height:30px; line-height: 14px; font-size:12px; color:#4e4e4e; padding-left:2%;
				}
				.voip-right{
					float:left; width:26%; text-align:left; height:30px; line-height: 14px; font-size:12px; color:#4e4e4e;
				}
			}			
			</style>

			<?php
		}
		function widget( $args, $instance ) {
			
			echo $args['before_widget'];
	?>
		<div class="row top_row">
			<div class="col-lg-12 body">
				<h3><?php echo $args['before_title'].esc_html($instance['title']).$args['after_title']; ?></h3>
				<div id="voip-main-area">
				    <div id="search-country-area">
				        <form action="#" method="post" id="search-country-form">
							
							
							<div id="search-country-results" class="main-search">
								<ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 1; top: 5px; left: 0px; display: block; position: relative; width: 418px;">
		
								</ul>
								<div class="ui-autocomplete no-results" style="z-index: 1; top: -5px; left: 0px; display: none; position: relative; width: 408px;">
									
								</div>
							</div>
							
							
							
				            <div class="field-row search-country-string">
				                <div id="search-country-results" class="main-search">
									<ul class="voip-auto ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem">
										
									</ul>
									<div class="ui-autocomplete no-results" style="z-index: 1; top: 0px; left: 0px; display: none;"></div>
								</div>
								
				                <div class="btn icon search" title="Search"></div>
				                <input class="main-search-field ui-autocomplete-input watermark" type="text" name="text" id="search_country" maxlength="40" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" data-emoji_font="true" style="font-family: Arial, 'Segoe UI Emoji', 'Segoe UI Symbol', Symbola, EmojiSymbols !important;" placeholder="Which country are you calling to?">
				            </div>
				        </form>
				        <div class="result" id="result">
					        <div id="search-country-rates">
					            <div class="from" id="from">From <?php echo get_option('from-price'); ?><span> c/min</span>
							</div>
				        </div>
						<div class="hr separator"></div>
						<?php
							if(get_option('show-prices') == '1'){
						?>
						<p style="text-align:center; margin-top:20px;font-size:12px; color:gray;">* <?php _e('Prices are in', 'voip-call-charges'); ?>  <?php echo get_option('currency'); ?> <?php _e('and do', 'voip-call-charges'); ?><?php if(get_option('vat') == '0'){ echo ' not'; } ?> <?php _e('include VAT', 'voip-call-charges'); ?></p>
						<?php
							}
							$option = get_option('from-price');
							if(empty($option)){
								echo '<p style="text-align:center;Pl">Please update plugin settings first!</p>';
							}
						?>
						<p>
							<?php echo $instance['textarea']; ?>
						</p>
				    </div>
				</div>
			</div>
		</div>
		<script>
			function ucfirst(str) {
			  str += '';
			  var f = str.charAt(0).toUpperCase();
			  return f + str.substr(1);
			}
			function isInt(n) {
			   return n % 1 === 0;
			}
			function isUpperCase(str) {
			    return str === str.toUpperCase();
			}
			function buildDropdown(obj, name){
				var html = "<li iso=\""+obj.class.toLowerCase()+"\" class=\"ui-menu-item voip-menuitem\" role=\"menuitem\">";
					html +="<a class=\"ui-corner-all nonlink\" tabindex=\"-1\">";
					html +="<span class=\"country\">"+name+"</span>";
					html +="<span class=\"code\">+"+obj.code+"</span>";
					html +="</a>";
					html +="</li>";
				jQuery(html).appendTo('.ui-autocomplete');
				jQuery('.btn.icon.search').addClass('voip-searching').css({background: 'url( "<?php echo plugins_url( 'search.png', __FILE__ ); ?>") no-repeat 0px -24px', cursor:'pointer'});	
			}
			jQuery(document).ready(function(){
				jQuery('#search_country').keyup(function(e){
					var matched = [];
					var val = jQuery(this).val();
					if(val.length > 1 || val.length == 1 && val.trim() == 1){
						jQuery('.ui-autocomplete').html('');
						jQuery('#search-country-results').show();
						var i = 0;
						var isClass = false;
						if(val.trim().length == 2 && val.trim().toLowerCase() == 'uk'){
							val = 'gb';
							isClass = true;
						}
						else if(val.trim().length == 3 && val.trim().toLowerCase() == 'usa'){
							val = 'us';
							isClass = true;
						}
						else if(val.trim().length == 2 && !isInt(val.trim()) && isUpperCase(val.trim())){
							isClass = true;
						}
						voip_countries.filter(function (obj) { 
							var match1 = false;
							var match2 = false;
							var match3 = false;
							
							if(!isClass){
								var exp = new RegExp("\\b"+val.toLowerCase().trim()+".*", 'g');
								var nicename = obj.nicename.toLowerCase();
								var match1 = nicename.match(exp);
								if(obj.code == val){
									match2 = true;
								}
							}
							if(obj.class.trim() == val.toLowerCase().trim()){
								match3 = true;
							}
							var name = obj.nicename.replace(ucfirst(val), '<b>'+ucfirst(val)+'</b>');
							if (match1 || match2 || match3){
								matched.push(obj.charge_id);
								if(obj.class.length > 0){
									buildDropdown(obj, name);
									i++;
								}
							}  
						});
						voip_countries.filter(function (obj) { 
							var match = false;
							var exp = new RegExp(val.toLowerCase().trim()+".*", 'g');
							var nicename = obj.nicename.toLowerCase();
							var match = nicename.match(exp);
							var name = obj.nicename.replace(val, '<b>'+val+'</b>');
							if (match && matched.indexOf(obj.charge_id) == -1 && !isClass){
								if(obj.class.length > 0){
									buildDropdown(obj, name);
									i++;
								}
							}
						});	
						if(i == 0){
							var html = "<li class=\"ui-menu-item voip-menuitem\" role=\"menuitem\"><b> <?php _e('No results', 'voip-call-charges'); ?></b></li>";
							jQuery('.btn.icon.search').addClass('voip-searching').css({background: 'url( "<?php echo plugins_url( 'search.png', __FILE__ ); ?>") no-repeat 0px -24px', cursor:'pointer'});
							jQuery(html).appendTo('.ui-autocomplete');
						}
					}
				});
				jQuery(document).on('click','.voip-menuitem', function() {
					var iso = jQuery(this).attr('iso');
					jQuery('#result').html('');
					voip_prices.filter(function (obj) { 
						var exp2 = new RegExp(iso.trim());
						var match = obj.class.match(exp2);
						if (match){
							var html = "<div class=\"voip-left\">"+obj.destination+"</div>";
								html += "<div class=\"voip-right\"><b>"+obj.price+"</b> c/min</div>";
								html += "<div class=\"voip-clear\"></div>";
							jQuery(html).appendTo('#result');
						} 
					});
					
					jQuery('#search_country').val('');
					jQuery('#search-country-results').fadeOut(200);
					jQuery('.btn.icon.search').removeClass('voip-searching').css({background: 'url( "<?php echo plugins_url( 'search.png', __FILE__ ); ?>") no-repeat 0px 0px', cursor:'cursor'});
				});
				jQuery('.btn.icon.search').click(function(){
					if(jQuery(this).hasClass('voip-searching')){
						jQuery('#search_country').val('');
						jQuery('#search-country-results').fadeOut(200);
						jQuery('.btn.icon.search').removeClass('voip-searching').css({background: 'url( "<?php echo plugins_url( 'search.png', __FILE__ ); ?>") no-repeat 0px 0px', cursor:'cursor'});
					}
				});
				<?php
				
				global $wpdb;
				$table_name = $wpdb->prefix . "voip_charges";
				$php_array = $wpdb->get_results( "SELECT * FROM $table_name GROUP BY nicename", OBJECT );
				$js_array = json_encode($php_array);
				echo "var voip_countries = ". $js_array . ";\n";
				
				$php_array = $wpdb->get_results( "SELECT * FROM $table_name", OBJECT );
				$js_array = json_encode($php_array);
				echo "var voip_prices = ". $js_array . ";\n";
				?>
			});
		</script>

	<?php
			echo $args['after_widget'];
		}
	}
	
	function voip_call_charges_widget() {
		register_widget( 'Voipcallcharges_widget' );
	}

	add_action( 'widgets_init', 'voip_call_charges_widget' );
	
	function voip_call_charges_widget_out() {
    
	    global $wp_widget_factory;
    
	    $widget_name = wp_specialchars('Voipcallcharges_widget');
    
	    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
	        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        
	        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
	            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
	        else:
	            $class = $wp_class;
	        endif;
	    endif;
    
	    ob_start();
	    the_widget($widget_name, $instance, array('widget_id'=>'arbitrary-instance-'.$id,
	        'before_widget' => '',
	        'after_widget' => '',
	        'before_title' => '',
	        'after_title' => ''
	    ));
	    $output = ob_get_contents();
	    ob_end_clean();
	    return $output;
    
	}
	add_shortcode('voip-call-charges-lite','voip_call_charges_widget_out'); 
?>