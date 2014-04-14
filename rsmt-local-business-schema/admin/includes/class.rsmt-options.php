<?php
    
if ( ! defined( 'ABSPATH' ) ) exit;
    
if ( ! class_exists( 'RSMT_Options' )  ) {
	class RSMT_Options {

		/* Array of sections for the theme options page */
		private $sections;

		/* Initialize */
		private function __construct() {
			$this->checkboxes = array();
			$this->settings = array();
			$this->get_schema_settings();

			$this->sections['main']      = __( 'main' );
			$this->sections['whitelabel']      = __( 'whitelabel' );
			$this->sections['schema']          = __( 'schema' );
			$this->sections['location']          = __( 'location' );

			add_action( 'admin_menu', array( &$this, 'add_pages' ) );
			add_action( 'admin_init', array( &$this, 'register_settings' ) );

			if ( ! get_option( 'rsmt_tools_settings' ) ){
				$this->initialize_settings();
			}
		}

		/* Add page(s) to the admin menu */
		public function add_pages() {
			$admin_page = add_menu_page( 'RSMT Tools - Main', 'RSMT Tools', 'manage_options', 'rsmt_tools_settings', array( &$this, 'display_page' ), plugins_url('views/img/icon.png', __FILE__) );
			if (get_option( 'schema_status' ) == '1' ){
				$admin_page .= add_submenu_page( 'rsmt_tools_settings', 'RSMT Tools - Schema', 'Schema Options', 'manage_options', 'rsmt_tools_schema', array(&$this, 'display_page' ) );
				$admin_page .= add_submenu_page( 'rsmt_tools_settings', 'RSMT Tools - Locations', 'Locations', 'manage_options', 'rsmt_tools_locations', array(&$this, 'display_page' ) );
			}
			if (get_option( 'whitelabel_status' ) == '1' ){
				$admin_page .= add_submenu_page( 'rsmt_tools_settings', 'Whitelabel', 'Whitelabel', 'manage_options', 'rsmt_tools_settings', array(&$this, 'display_page' ) );
			}
		}

		/* HTML to display the theme options page */
		public function display_schema_page() {
			include (array( plugins_url() . 'views/rsmt_main_options.php' ) );
			include (array( plugins_url() . 'views/rsmt_schema_options.php' ) );
			include (array( plugins_url() . 'views/rsmt_location_options.php' ) );
		}

		/**
		 * Define all settings and their defaults */
		 public function get_schema_settings() {
			$this->settings['name'] = array(
				'title'   => __( 'Business Name' ),
				'desc'    => __( 'This is a description for the text input.' ),
				'std'     => '',
				'type'    => 'text',
				'section' => 'schema'
				);

			$this->settings['legal_name'] = array(
				'title'   => __( 'Legal Name' ),
				'desc'    => __( 'The registered legal name for your business.' ),
				'std'     => '',
				'type'    => 'text',
				'section' => 'schema'
				);

			$this->settings['description'] = array(
				'title'   => __( 'description' ),
				'desc'    => __( 'Description of your business.' ),
				'std'     => '',
				'type'    => 'textarea',
				'section' => 'schema'
				);

			/*
			$this->settings['example_checkbox'] = array(
				'section' => 'schema',
				'title'   => __( 'Example Checkbox' ),
				'desc'    => __( 'This is a description for the checkbox.' ),
				'type'    => 'checkbox',
				'std'     => 1 // Set to 1 to be checked by default, 0 to be unchecked by default.
			);
                            
			$this->settings['example_heading'] = array(
				'section' => 'whitelabel',
				'title'   => '', // Not used for headings.
				'desc'    => 'Example Heading',
				'type'    => 'heading'
			);

			$this->settings['example_radio'] = array(
				'section' => 'whitelabel',
				'title'   => __( 'Example Radio' ),
				'desc'    => __( 'This is a description for the radio buttons.' ),
				'type'    => 'radio',
				'std'     => '',
				'choices' => array(
					'choice1' => 'Choice 1',
					'choice2' => 'Choice 2',
					'choice3' => 'Choice 3'
				)
			);
			*/

			$this->settings['status'] = array(
				'section' => 'whitelabel',
				'title'   => __( 'Enable/DIsable' ),
				'desc'    => __( 'Enable or Disable the Embedding of Schema Data.' ),
				'type'    => 'select',
				'std'     => 'Disbaled',
				'choices' => array(
					'Enabled' => 'Enabled',
					'Disabled' => 'Disabled'
					)
				);

			$this->settings['logo'] = array(
				'section' => 'schema',
				'title'   => __( 'Logo' ),
				'desc'    => __( 'Enter the URL to your logo.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['url'] = array(
				'section' => 'schema',
				'title'   => __( 'Website Url' ),
				'desc'    => __( 'Enter the URL to your website.' ),
				'type'    => 'text',
				'std'     => '<?php echo get_bloginfo ( "url" ); ?>'
				);

			$this->settings['sameas'] = array(
				'section' => 'schema',
				'title'   => __( 'Reference Url' ),
				'desc'    => __( 'Enter the URL that defines your company. Defaults to Website Url' ),
				'type'    => 'text',
				'std'     => '<?php echo get_option( array( $this->setting[ "url" ] ) ); ?>'
				);

			$this->settings['type'] = array(
				'section' => 'schema',
				'title'   => __( 'Business Type' ),
				'desc'    => __( 'Select your specific business type.' ),
				'type'    => 'select',
				'std'     => '',
				'choices' => array(
					'AccountingService' => 'Accounting Service',
					'AdultEntertainment' => 'Adult Entertainment',
					'AmusementPark' => 'Amusement Park',
					'AnimalShelter' => 'Animal Shelter',
					'ArtGallery' => 'Art Gallery',
					'Attorney' => 'Attorney',
					'AutoBodyShop' => 'Auto Body Shop',
					'AutoDealer' => 'Auto Dealer',
					'AutomatedTeller' => 'Automated Teller',
					'AutomotiveBusiness' => 'Automotive Business',
					'AutoPartsStore' => 'Auto Parts Store',
					'AutoRental' => 'Auto Rental',
					'AutoRepair' => 'Auto Repair',
					'AutoWash' => 'Auto Wash',
					'Bakery' => 'Bakery',
					'BankOrCreditUnion' => 'Bank Or Credit Union',
					'BarOrPub' => 'Bar Or Pub',
					'BeautySalon' => 'Beauty Salon',
					'BedAndBreakfast' => 'Bed And Breakfast',
					'BikeStore' => 'Bike Store',
					'BookStore' => 'Book Store',
					'BowlingAlley' => 'Bowling Alley',
					'Brewery' => 'Brewery',
					'CafeOrCoffeeShop' => 'Cafe Or CoffeeShop',
					'Casino' => 'Casino',
					'ChildCare' => 'Child Care',
					'ClothingStore' => 'Clothing Store',
					'ComedyClub' => 'Comedy Club',
					'ComputerStore' => 'Computer Store',
					'ConvenienceStore' => 'Convenience Store',
					'DaySpa' => 'Day Spa',
					'Dentist' => 'Dentist',
					'DepartmentStore' => 'Department Store',
					'DiagnosticLab' => 'Diagnostic Lab',
					'DryCleaningOrLaundry' => 'Dry Cleaning Or Laundry',
					'Electrician' => 'Electrician',
					'ElectronicsStore' => 'Electronics Store',
					'EmergencyService' => 'EmergencyService',
					'EmploymentAgency' => 'Employment Agency',
					'EntertainmentBusiness' => 'Entertainment Business',
					'ExerciseGym' => 'Exercise Gym',
					'FastFoodRestaurant' => 'Fast Food Restaurant',
					'FireStation' => 'Fire Station',
					'FinancialService' => 'Financial Service',
					'Florist' => 'Florist',
					'FoodEstablishment' => 'Food Establishment',
					'FurnitureStore' => 'Furniture Store',
					'GardenStore' => 'Garden Store',
					'GasStation' => 'Gas Station',
					'GeneralContractor' => 'General Contractor',
					'GolfCourse' => 'Golf Course',
					'GroceryStore' => 'Grocery Store',
					'GovernmentOffice' => 'Government Office',
					'HairSalon' => 'Hair Salon',
					'HardwareStore' => 'Hardware Store',
					'HealthAndBeautyBusiness' => 'Health And Beauty Business',
					'HealthClub' => 'Health Club',
					'HobbyShop' => 'HobbyShop',
					'HomeGoodsStore' => 'Home Goods Store',
					'Hospital' => 'Hospital',
					'Hostel' => 'Hostel',
					'Hotel' => 'Hotel',
					'HousePainter' => 'House Painter',
					'HVACBusiness' => 'HVAC Business',
					'IceCreamShop' => 'Ice Cream Shop',
					'InsuranceAgency' => 'Insurance Agency',
					'InternetCafe' => 'Internet Cafe',
					'JewelryStore' => 'JewelryStore',
					'Library' => 'Library',
					'LiquorStore' => 'Liquor Store',
					'Locksmith' => 'Locksmith',
					'LodgingBusiness' => 'Lodging Business',
					'MedicalClinic' => 'Medical Clinic',
					'MedicalOrganization' => 'Medical Organization',
					'MensClothingStore' => 'Mens Clothing Store',
					'MobilePhoneStore' => 'Mobile Phone Store',
					'Motel' => 'Motel',
					'MotorcycleDealer' => 'Motorcycle Dealer',
					'MotorcycleRepair' => 'Motorcycle Repair',
					'MovieRentalStore' => 'Movie Rental Store',
					'MovieTheater' => 'Movie Theater',
					'MovingCompany' => 'Moving Company',
					'MusicStore' => 'Music Store',
					'NailSalon' => 'Nail Salon',
					'NightClub ' => 'Night Club',
					'Notary' => 'Notary',
					'OfficeEquipmentStore' => 'Office Equipment Store',
					'Optician' => 'Optician',
					'OutletStore' => 'Outlet Store',
					'PawnShop' => 'Pawn Shop',
					'PetStore' => 'Pet Store',
					'Pharmacy' => 'Pharmacy',
					'Physician' => 'Physician',
					'Plumber' => 'Plumber',
					'PoliceStation' => 'Police Station',
					'PostOffice' => 'Post Office',
					'ProfessionalService' => 'Professional Service',
					'PublicSwimmingPool' => 'Public Swimming Pool',
					'RadioStation' => 'Radio Station',
					'RealEstateAgent' => 'Real Estate Agent',
					'RecyclingCenter' => 'Recycling Center',
					'Restaurant' => 'Restaurant',
					'RoofingContractor' => 'Roofing Contractor',
					'SelfStorage' => 'Self Storage',
					'ShoeStore' => 'Shoe Store',
					'ShoppingCenter' => 'Shopping Center',
					'SkiResort' => 'Ski Resort',
					'SportsActivityLocation' => 'Sports Activity Location',
					'SportingGoodsStore' => 'Sporting Goods Store',
					'SportsClub' => 'Sports Club',
					'Store' => 'Store',
					'StadiumOrArena' => 'Stadium Or Arena',
					'TattooParlor' => 'Tattoo Parlor',
					'TelevisionStation' => 'Television Station',
					'TennisComplex' => 'Tennis Complex',
					'TireShop' => 'Tire Shop',
					'TouristInformationCenter' => 'Tourist Information Center',
					'ToyStore' => 'Toy Store',
					'TravelAgency' => 'Travel Agency',
					'VeterinaryCare' => 'Veterinary Care',
					'WholesaleStore' => 'Wholesale Store',
					'Winery' => 'Winery',
					)
				);

			$this->settings['cash'] = array(
				'section' => 'schema',
				'title'   => __( 'Cash' ),
				'desc'    => __( '' ),
				'type'    => 'checkbox',
				'std'     => 1
				);

			$this->settings['check'] = array(
				'section' => 'schema',
				'title'   => __( 'Check' ),
				'desc'    => __( '' ),
				'type'    => 'checkbox',
				'std'     => 0
				);

			$this->settings['mastercard'] = array(
				'section' => 'schema',
				'title'   => __( 'Mastercard' ),
				'desc'    => __( '' ),
				'type'    => 'checkbox',
				'std'     => 0
				);

			$this->settings['visa'] = array(
				'section' => 'schema',
				'title'   => __( 'Visa' ),
				'desc'    => __( '' ),
				'type'    => 'checkbox',
				'std'     => 0
				);

			$this->settings['amex'] = array(
				'section' => 'schema',
				'title'   => __( 'American Express' ),
				'desc'    => __( '' ),
				'type'    => 'checkbox',
				'std'     => 0
				);

			$this->settings['price_range'] = array(
				'section' => 'schema',
				'title'   => __( 'Price Range' ),
				'desc'    => __( 'Ranges from $ for inexpensive to $$$$ for expensive .' ),
				'type'    => 'radio',
				'std'     => '$',
				'choices' => array(
					'$' => '$',
					'$$' => '$$',
					'$$$' => '$$$',
					'$$$$' => '$$$'
					)
				);

			$this->settings['email'] = array(
				'section' => 'schema',
				'title'   => __( 'Email' ),
				'desc'    => __( 'Enter the email you wish to display as a business contact mail.' ),
				'type'    => 'text',
				'std'     => '<?php echo get_bloginfo( "admin_email" ); ?>'
				);

			$this->settings['state'] = array(
				'section' => 'schema',
				'title'   => __( 'Reference Url' ),
				'desc'    => __( 'Enter the URL to your logo for the theme header.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['employee'] = array(
				'section' => 'schema',
				'title'   => __( 'Employee Role' ),
				'desc'    => __( 'Select the role' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['telephone'] = array(
				'section' => 'schema',
				'title'   => __( 'Telephone' ),
				'desc'    => __( 'Required' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['fax_number'] = array(
				'section' => 'schema',
				'title'   => __( 'Fax Number' ),
				'desc'    => __( 'Optional.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['best_rating'] = array(
				'section' => 'schema',
				'title'   => __( 'Best Rating Value' ),
				'desc'    => __( 'Required if using ratings.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['rating_value'] = array(
				'section' => 'schema',
				'title'   => __( 'Rating Value' ),
				'desc'    => __( 'Required if using rating.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['dow'] = array(
				'section' => 'schema',
				'title'   => __( 'Day of Week' ),
				'desc'    => __( 'Required.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['opens'] = array(
				'section' => 'schema',
				'title'   => __( 'Opens' ),
				'desc'    => __( 'Required.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['closes'] = array(
				'section' => 'schema',
				'title'   => __( 'Closes' ),
				'desc'    => __( 'Required.' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['geo_location'] = array(
				'section' => 'schema',
				'title'   => __( 'Geo Location' ),
				'desc'    => __( 'Optional.' ),
				'type'    => 'checkbox',
				'std'     => ''
				);

			$this->settings['longitude'] = array(
				'section' => 'schema',
				'title'   => __( 'Longitude' ),
				'desc'    => __( '' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['latitude'] = array(
				'section' => 'schema',
				'title'   => __( 'Latitude' ),
				'desc'    => __( '' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['founder_role'] = array(
				'section' => 'schema',
				'title'   => __( 'Founder Role' ),
				'desc'    => __( 'Optional: Select the user role of the business founder' ),
				'type'    => 'select',
				'std'     => ''
				);

			$this->settings['employee_role'] = array(
				'section' => 'schema',
				'title'   => __( 'Employee Role' ),
				'desc'    => __( 'Optional: Select employee user roles' ),
				'type'    => 'text',
				'std'     => ''
				);

			$this->settings['custom_css'] = array(
				'title'   => __( 'Custom Styles' ),
				'desc'    => __( 'Enter any custom CSS here to apply it to your theme.' ),
				'std'     => '',
				'type'    => 'textarea',
				'section' => 'appearance',
				'class'   => 'code'
				);
	}

	/* Initialize settings to their default values */
	public function initialize_settings() {
		// code
	}
            
	/* Register settings via the WP Settings API */
	public function register_settings() {
		// code
	}
            
	public function create_setting( $args = array() ) {
		$defaults = array(
			'id'      => 'default_field',
			'title'   => 'Default Field',
			'desc'    => 'This is a default description.',
			'std'     => '',
			'type'    => 'text',
			'section' => 'whitelabel',
			'choices' => array(),
			'class'   => ''
		);
		extract( wp_parse_args( $args, $defaults ) );
		$field_args = array(
			'type'      => $type,
			'id'        => $id,
			'desc'      => $desc,
			'std'       => $std,
			'choices'   => $choices,
			'label_for' => $id,
			'class'     => $class
		);
	}
}

		if ( $type == 'checkbox' ){
			$this->checkboxes[] = $id;
		}

		add_settings_field( $id, $title, array( $this, 'display_setting' ), 'rsmt-options', $section, $field_args );


$RSMT_Options = new RSMT_Options;