<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Class for displaying the local business information
 */
if ( ! class_exists( 'LocalBusiness' ) ) {
	class LocalBusiness {
		public $name;
		public function __construct(){
			$this->name = 'rsmtLocalBusiness';
		}
		/**
		 * function/getParent
		 * Usage: create tables if not exist and activates the plugin
		 * Arg(0): null
		 * Return: if found return parent type of business
		 */
		static function get_Parent() {
			$parent = get_option( 'rsmt_type' );
			$array  = array(
				'AutoBody Shop:AutomotiveBusiness',
				'AutoDealer:AutomotiveBusiness',
				'AutoPartsStore:AutomotiveBusiness',
				'AutoRental:AutomotiveBusiness',
				'AutoRepair:AutomotiveBusiness',
				'AutoWash:AutomotiveBusiness',
				'GasStation:AutomotiveBusiness',
				'MotorcycleDealer:AutomotiveBusiness',
				'MotorcycleRepair:AutomotiveBusiness',
				'FireStation:EmergencyService',
				'Hospital:EmergencyService',
				'PoliceStation:EmergencyService',
				'AdultEntertainment:EntertainmentBusiness',
				'AmusementPark:EntertainmentBusiness',
				'ArtGallery:EntertainmentBusiness',
				'Casino:EntertainmentBusiness',
				'ComedyClub:EntertainmentBusiness',
				'MovieTheater:EntertainmentBusiness',
				'NightClub:EntertainmentBusiness',
				'FinancialService:FinancialService',
				'AccountingService:FinancialService',
				'AutomatedTeller:FinancialService',
				'BankOrCreditUnion:FinancialService',
				'InsuranceAgency:FinancialService',
				'FoodEstablishment:FoodEstablishment',
				'Bakery:FoodEstablishment',
				'BarOrPub:FoodEstablishment',
				'Brewery:FoodEstablishment',
				'CafeOrCoffeeShop:FoodEstablishment',
				'FastFoodRestaurant:FoodEstablishment',
				'IceCreamShop:FoodEstablishment',
				'Restaurant:FoodEstablishment',
				'Winery:FoodEstablishment',
				'PostOffice:GovernmentOffice',
				'BeautySalon:HealthAndBeautyBusiness',
				'DaySpa:HealthAndBeautyBusiness',
				'HairSalon:HealthAndBeautyBusiness',
				'HealthClub:HealthAndBeautyBusiness',
				'NailSalon:HealthAndBeautyBusiness',
				'TattooParlor:HealthAndBeautyBusiness',
				'Electrician:HomeAndConstructionBusiness',
				'GeneralContractor:HomeAndConstructionBusiness',
				'HVACBusiness:HomeAndConstructionBusiness',
				'HousePainter:HomeAndConstructionBusiness',
				'Locksmith:HomeAndConstructionBusiness',
				'MovingCompany:HomeAndConstructionBusiness',
				'Plumber:HomeAndConstructionBusiness',
				'RoofingContractor:HomeAndConstructionBusiness',
				'BedAndBreakfast:LodgingBusiness',
				'Hostel:LodgingBusiness',
				'Hotel:LodgingBusiness',
				'Motel:LodgingBusiness',
				'Dentist:MedicalOrganization',
				'DiagnosticLab:MedicalOrganization',
				'Hospital:MedicalOrganization',
				'MedicalClinic:MedicalOrganization',
				'Optician:MedicalOrganization',
				'Pharmacy:MedicalOrganization',
				'Physician:MedicalOrganization',
				'VeterinaryCare:MedicalOrganization',
				'AccountingService:ProfessionalService',
				'Attorney:ProfessionalService',
				'Dentist:ProfessionalService',
				'Electrician:ProfessionalService',
				'GeneralContractor:ProfessionalService',
				'HousePainter:ProfessionalService',
				'Locksmith:ProfessionalService',
				'Notary:ProfessionalService',
				'Plumber:ProfessionalService',
				'RoofingContractor:ProfessionalService',
				'BowlingAlley:SportsActivityLocation',
				'ExerciseGym:SportsActivityLocation',
				'GolfCourse:SportsActivityLocation',
				'HealthClub:SportsActivityLocation',
				'PublicSwimmingPool:SportsActivityLocation',
				'SkiResort:SportsActivityLocation',
				'SportsClub:SportsActivityLocation',
				'StadiumOrArena:SportsActivityLocation',
				'TennisComplex:SportsActivityLocation',
				'AutoPartsStore:Store',
				'BikeStore:Store',
				'BookStore:Store',
				'ClothingStore:Store',
				'ComputerStore:Store',
				'ConvenienceStore:Store',
				'DepartmentStore:Store',
				'ElectronicsStore:Store',
				'Florist:Store',
				'FurnitureStore:Store',
				'GardenStore:Store',
				'GroceryStore:Store',
				'HardwareStore:Store',
				'HobbyShop:Store',
				'HomeGoodsStore:Store',
				'JewelryStore:Store',
				'LiquorStore:Store',
				'MensClothingStore:Store',
				'MobilePhoneStore:Store',
				'MovieRentalStore:Store',
				'MusicStore:Store',
				'OfficeEquipmentStore:Store',
				'OutletStore:Store',
				'PawnShop:Store',
				'PetStore:Store',
				'ShoeStore:Store',
				'SportingGoodsStore:Store',
				'TireShop:Store',
				'ToyStore:Store',
				'WholesaleStore:Store',
			);
			foreach ( $array as $var ) {
				$val = explode( ':', $var );
				switch ( $val[0] ) {
					case $parent:
						$set = $val[1];
						break;
				}
			}
			if ( $set ) {
				return $set;
			} else {
				return false;
			}
		}

		/**
		 * function/localBusiness
		 * Usage: creates localBusiness schema and outputs information
		 * Arg(0): null
		 * Return: void
		 */
		static function show_local_business() {
			$rsmt_info  = '<!--begin rsmt schema plugin -->';
			$rsmt_info .= '<span itemscope itemtype="http://schema.org/LocalBusiness">';
			if ( self::get_parent() ) {
				$rsmt_info .= '<span itemprop="additionalType" itemscope itemtype="http://schema.org/' . self::get_parent() . '">';
			}
			if ( get_option( 'rsmt_type' ) ) {
				$rsmt_info .= '<span itemprop="additionalType"  itemscope itemtype="http://schema.org/' . get_option( 'rsmt_type' ) . '">';
			}

			/* name of business and url */
			if ( get_option( 'rsmt_name' ) ) {
				if ( get_option( 'rsmt_url' ) ) {
					$rsmt_info .= '<a itemprop="url" href="' . get_option( 'rsmt_url' ) . '" class="visuallyhidden"><span itemprop="name">' . get_option( 'rsmt_name' ) . '</span></a>';
				} else {
					$rsmt_info .= '<a itemprop="url" href="' . get_bloginfo( 'url' ) . '" class="visuallyhidden"><span itemprop="name">' . get_option( 'rsmt_name' ) . '</span></a>';
				}
			} else {
				if ( get_option( 'rsmt_url' ) ) {
					$rsmt_info .= '<a itemprop="url" href="' . get_option( 'rsmt_url' ) . '" class="visuallyhidden"><span itemprop="name">' . get_bloginfo( 'name' ) . '</span></a>';
				} else {
					$rsmt_info .= '<a itemprop="url" href="' . get_bloginfo( 'url' ) . '" class="visuallyhidden"><span itemprop="name">' . get_bloginfo( 'name' ) . '</span></a>';
				}
			}

			/* description of business */
			if ( get_option( 'rsmt_description' ) ) {
				$rsmt_info .= '<meta itemprop="description" content="' . get_option( 'rsmt_description' ) . '" />';
			} else {
				$rsmt_info .= '<meta itemprop="description" content="' . get_bloginfo( 'description' ) . '" />';
			}

			/* logo of business */
			if ( get_option( 'rsmt_image' ) ) {
				$rsmt_info .= '<meta itemprop="image" content="' . get_option( 'rsmt_image' ) . '" />';
			}

			/* wiki page or other site of business association */
			if ( get_option( 'rsmt_sameas' ) ) {
				$rsmt_info .= '<meta itemprop="sameAs" content="' . get_option( 'rsmt_sameas' ) . '" />';
			}
			$rsmt_info .= self::aggregate_rating();

			$rsmt_info .= '<span itemprop="hasPOS location" itemscope itemtype="http://schema.org/Place">';
			/* physical address */
			$rsmt_info .= self::postal_address_one();
			if ( get_option( 'rsmt_geo_location_one' ) ) {
				$rsmt_info .= self::geo_location_one();
			}

			$rsmt_info .= '</span>';

			if ( get_option( 'rsmt_street_address_two' ) ){
                            $rsmt_info .= '<span itemprop="hasPOS location" itemscope itemtype="http://schema.org/Place">';
                            $rsmt_info .= self::postal_address_two();
                            /* geo location */
                            if ( get_option( 'rsmt_geo_location_two' ) ) {
                                $rsmt_info .= self::geo_location_two();
                            }
                            $rsmt_info .= '</span>';
                        }
			/* type of payments visa, master card, check, cash */
			if ( get_option( 'rsmt_payment_accepted' ) ) {
				$rsmt_info .= '<meta itemprop="paymentAccepted" content="' . get_option( 'rsmt_payment_accepted' ) . '" />';
			}

			/* price range of items*/
			if ( get_option( 'rsmt_price_range' ) ) {
				$rsmt_info .= '<meta itemprop="priceRange" content="' . get_option( 'rsmt_price_range' ) . '" />';
			}


			/* opening hours of business */
			if ( ( get_option( 'rsmt_dow' ) ) && ( get_option( 'rsmt_open' ) ) && ( get_option( 'rsmt_close' ) ) ) {

				$rsmt_info .= '<meta itemprop="openingHours" content="' . get_option( 'rsmt_dow' ) . ' ' . get_option( 'rsmt_open' ) . '-' . get_option( 'rsmt_close' ) . '" />';

			}

			/* employees */
			if ( get_option( 'rsmt_employee_role' ) ) {

				$rsmt_info .= self::get_employee();
			}

			/* employees */
			if ( get_option( 'rsmt_founder_role' ) ) {

				$rsmt_info .= self::get_founder();
			}

			/* reviews */
			if ( ( get_option( 'rsmt_review' ) ) && ( get_option( 'rsmt_review_default' ) ) ) {
				$rsmt_info .= self::get_reviews();
			}

			/* member of Repair Shop Marketing Tools */
			if ( ( get_option( 'rsmt_member' ) ) || ( ( get_option( 'rsmt_member_url' ) ) && ( get_option( 'rsmt_member_name' ) ) ) ) {
				$rsmt_info .= self::member();
			}

			/* seeks SEO */
			if ( ( get_option( 'rsmt_seeks' ) ) || ( ( get_option( 'rsmt_seeks_url' ) ) && ( get_option( 'rsmt_seeks_name' ) ) ) ) {
				$rsmt_info .= self::seeks();
			}

			if ( self::getParent() ) {
				$rsmt_info .= '</span>';
			}

			if ( get_option( 'rsmt_type' ) ) {
				$rsmt_info .= '</span>';
			}
			$rsmt_info .= '</span>';
			$rsmt_info .= '<!--end RSMT Schema plugin-->';

			echo str_replace( array( '\r', '\n' ), '', str_replace( ' ', ' ', $rsmt_info ) );
		}

		static function rsmt_create_location_fields(){
			$locations = get_option( 'rsmt_locations' );
			for ( $i = 0; $i < $locations; $i++ ){
			}
		}
		/** function/postalAddress
		 * Usage: create postal address schema
		 * Arg(0): null
		 * Return: postal address schema
		 */
		static function postal_address_one(){
			$error = 0;
			$rsmt_info  = "";
			$rsmt_info .= '<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';
			/* street address */
			if ( get_option( 'rsmt_street_address_one' ) ) {
				$rsmt_info .= '<meta itemprop="streetAddress" content="' . get_option( 'rsmt_street_address_one' ) . '" />';
			}

			/* city */
			if ( get_option( 'rsmt_address_locality_one' ) ) {
				$rsmt_info .= '<meta itemprop="addressLocality" content="' . get_option( 'rsmt_address_locality_one' ) . '" />';
			} else {
				$error = 1;
			}

			/* state */
			if ( get_option( 'rsmt_address_region_one' ) ) {
				$rsmt_info .= '<meta itemprop="addressRegion" content="' . get_option( 'rsmt_address_region_one' ) . '" />';
			} else {
				$error = 1;
			}

			/* zip code */
			if ( get_option( 'rsmt_postal_code_one' ) ) {
				$rsmt_info .= '<meta itemprop="postalCode" content="' . get_option( 'rsmt_postal_code_one' ) . '" />';
			}

			/* county is USA */
			if ( get_option( 'rsmt_address_country_one' ) ) {
				$rsmt_info .= '<meta itemprop="addressCountry" content="' . get_option( 'rsmt_address_country_one' ) . '" />';
			}

			/* email */
			if ( get_option( 'rsmt_email' ) ) {
				$rsmt_info .= '<meta itemprop="email" content="' . get_option( 'rsmt_email' ) . '" />';
			}

			/* telephone */
			if ( get_option( 'rsmt_telephone_one' ) ) {
				$rsmt_info .= '<meta itemprop="telephone" content="' . get_option( 'rsmt_telephone_one' ) . '" />';
			}

			/* fax */
			if ( get_option( 'rsmt_fax_number_one' ) ) {
				$rsmt_info .= '<meta itemprop="faxNumber" content="' . get_option( 'rsmt_fax_number_one' ) . '" />';
			}
			$rsmt_info .= '</span>';
			if ( $error == 0 ) {
				return $rsmt_info;
			}
		}
		static function postal_address_two(){

			$error      = 0;
			$rsmt_info  = "";

			$rsmt_info .= '<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">';

			/* street address */
			if ( get_option( 'rsmt_street_address_two' ) ) {
				$rsmt_info .= '<meta itemprop="streetAddress" content="' . get_option( 'rsmt_street_address_two' ) . '" />';
			}

			/* city */
			if ( get_option( 'rsmt_address_locality_two' ) ) {
				$rsmt_info .= '<meta itemprop="addressLocality" content="' . get_option( 'rsmt_address_locality_two' ) . '" />';
			} else {
				$error = 1;
			}

			/* state */
			if ( get_option( 'rsmt_address_region_two' ) ) {
				$rsmt_info .= '<meta itemprop="addressRegion" content="' . get_option( 'rsmt_address_region_two' ) . '" />';
			} else {
				$error = 1;
			}

			/* zip code */
			if ( get_option( 'rsmt_postal_code_two' ) ) {
				$rsmt_info .= '<meta itemprop="postalCode" content="' . get_option( 'rsmt_postal_code_two' ) . '" />';
			}

			/* county is USA */
			if ( get_option( 'rsmt_address_country_two' ) ) {
				$rsmt_info .= '<meta itemprop="addressCountry" content="' . get_option( 'rsmt_address_country_two' ) . '" />';
			}

			/* email */
			if ( get_option( 'rsmt_email' ) ) {
				$rsmt_info .= '<meta itemprop="email" content="' . get_option( 'rsmt_email' ) . '" />';
			}

			/* telephone */
			if ( get_option( 'rsmt_telephone_two' ) ) {
				$rsmt_info .= '<meta itemprop="telephone" content="' . get_option( 'rsmt_telephone_two' ) . '" />';
			}

			/* fax */
			if ( get_option( 'rsmt_fax_number_two' ) ) {
				$rsmt_info .= '<meta itemprop="faxNumber" content="' . get_option( 'rsmt_fax_number_two' ) . '" />';
			}
			$rsmt_info .= '</span>';
			if ( $error == 0 ) {
				return $rsmt_info;
			}
		}

		/**
		 * function/aggregateRating
		 * Usage: creates aggregate rating for schema
		 * Arg(0): null
		 * Return: aggregate rating schema
		 */
		static function aggregate_rating(){

			$error = 0;
			$rsmt_info = "";

			$rsmt_info .= '<span itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';

			/* total value i.e 1-5 should be 5 */
			if ( get_option( 'rsmt_rating_value' ) ) {
				$rsmt_info .= '<meta itemprop="ratingValue" content="' . get_option( 'rsmt_rating_value' ) . '" />';
			} else {
				$error = 1;
			}

			/* best rating */
			if ( get_option( 'rsmt_best_rating' ) ) {
				$rsmt_info .= '<meta itemprop="bestRating" content="' . get_option( 'rsmt_best_rating' ) . '" />';
			} else {
				$error = 1;
			}

			/* lowest rating */
			if ( get_option( 'rsmt_worst_rating' ) ) {
				$rsmt_info .= '<meta itemprop="worstRating" content="' . get_option( 'rsmt_worst_rating' ) . '" />';
			} else {
				$error = 1;
			}

			/* how many votes, count */
			if ( get_option( 'rsmt_rating_count' ) ) {
				$rsmt_info .= '<meta itemprop="ratingCount" content="' . get_option( 'rsmt_rating_count' ) . '" />';
			} else {
				$error = 1;
			}

			$rsmt_info .= '</span>';
			if ( $error == 0 ) {
				return $rsmt_info;
			}

		}

		/**
		 * function/geoLocation
		 * Usage: creates geo location for schema
		 * Arg(0): null
		 * Return: geo location schema
		 */
		static function geo_location_one() {
			if ( ( ! get_option( 'rsmt_latitude_one' ) ) || ( ! get_option( 'rsmt_longitude_one' ) )
				|| (preg_match
				(
					'#[0-9]{2}\.[0-9]{2}#', get_option
					(
						'rsmt_longitude_one'
					)
				))
			) {
				self::get_geo_location_one();
			}

			$rsmt_info = "";

			$rsmt_info .= '<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">';

			$rsmt_info .= '<meta itemprop="latitude" content="' . get_option( 'rsmt_latitude_one' ) . '" />';

			$rsmt_info .= '<meta itemprop="longitude" content="' . get_option( 'rsmt_longitude_one' ) . '" />';

			$rsmt_info .= '</span>';

			return $rsmt_info;

		}
		static function geo_location_two() {
			if ( ( ! get_option( 'rsmt_latitude_two' ) ) || ( ! get_option( 'rsmt_longitude_two' ) )
				|| ( preg_match
				(
					'#[0-9]{2}\.[0-9]{2}#', get_option
					(
						'rsmt_longitude_two'
					)
				))
			) {
				self::get_geo_location_two();
			}
			$rsmt_info = "";
			$rsmt_info .= '<span itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">';
			$rsmt_info .= '<meta itemprop="latitude" content="' . get_option( 'rsmt_latitude_two' ) . '" />';
			$rsmt_info .= '<meta itemprop="longitude" content="' . get_option( 'rsmt_longitude_two' ) . '" />';
			$rsmt_info .= '</span>';
			return $rsmt_info;
		}

		/**
		 * function/getEmployee
		 * Usage: creates employees for schema
		 * Arg(0): null
		 * Return: employees schema
		 */
		static function get_employee() {
			$rsmt_info = "";
			$employees = get_users( 'role=' . get_option( 'rsmt_employee_role' ) . '&all_user_meta' );
			$rsmt_info .= '<span itemprop="employees" itemscope itemtype="http://schema.org/employees">';
			foreach ( $employees as $employee ) {
				if ( $employee->display_name ) {
					$employee_name = $employee->display_name;
				} else {
					$employee_name = $employee->user_nicename;
				}
				$rsmt_info .= '<span itemprop="employee" itemscope itemtype="http://schema.org/Person">';
				$rsmt_info .= '<a itemprop="url" href="http://microdataproject.org/author/' . $employee->user_login . '/" class="visuallyhidden"><span itemprop="name">' . $employee_name . '</span></a>';
				/* email */
				if ($employee->user_email) {
					$rsmt_info .= '<meta itemprop="email" content="' . $employee->user_email . '" />';
				}
				if ($employee->description) {
					$rsmt_info .= '<meta itemprop="description" content="' . $employee->description . '" />';
				}
				$rsmt_info .= '</span>';
			}
			$rsmt_info .= '</span>';
			return $rsmt_info;
		}
 
		/**
		 * function/getFounder
		 * Usage: creates founders for schema
		 * Arg(0): null
		 * Return: founders schema
		 */
		static function get_founder() {
			$rsmt_info = "";
			$founders = get_users( 'role=' . get_option( 'rsmt_founder_role' ) . '&all_user_meta' );
			$rsmt_info .= '<span itemprop="founders" itemscope itemtype="http://schema.org/founders">';
			foreach ($founders as $founder) {
				if ($founder->display_name) {
					$founder_name = $founder->display_name;
				} else {
					$founder_name = $founder->user_nicename;
				}
				$rsmt_info .= '<span itemprop="founder"  itemscope itemtype="http://schema.org/Person">';
				$rsmt_info .= '<a itemprop="url" href="http://microdataproject.org/author/' . $founder->user_login . '/" class="visuallyhidden"><span itemprop="name">' . $founder_name . '</span></a>';
				/* email */
				if ($founder->user_email) {
					$rsmt_info .= '<meta itemprop="email" content="' . $founder->user_email . '" />';
				}
				if ($founder->description) {
					$rsmt_info .= '<meta itemprop="description" content="' . $founder->description . '" />';
				}
				$rsmt_info .= '</span>';
			}
			$rsmt_info .= '</span>';
			return $rsmt_info;
		}
		static function visually_hidden() {
			$style = '<style> .visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }</style>';
			return print($style);
		}

		static function get_geo_location_one(){
			$address = get_option( 'rsmt_street_address_one' ) . ',
			' . get_option( 'rsmt_address_locality_one' ) . ', ' . get_option( 'rsmt_address_region_one' ) . ' ' . get_option( 'rsmt_postal_code_one' );
			// fetching lat and lng from Google Maps
			$request_uri = 'http://maps.googleapis.com/maps/api/geocode/xml?address=' . urlencode( $address )
				. '&sensor=true';
			$google_xml = simplexml_load_file($request_uri);
			$lat = (string) $google_xml->result->geometry->location->lat;
			// fetching time from earth tools
			$lng = (string) $google_xml->result->geometry->location->lng;

			update_option( 'rsmt_latitude_one', $lat );
			update_option( 'rsmt_longitude_one', $lng );
		}

		static function get_geo_location_two(){
			$address = get_option( 'rsmt_street_address_two' ) . ',
			' . get_option( 'rsmt_address_locality_two' ) . ', ' . get_option( 'rsmt_address_region_two' ) . ' ' . get_option( 'rsmt_postal_code_two' );
			// fetching lat&amp;lng from Google Maps
			$request_uri = 'http://maps.googleapis.com/maps/api/geocode/xml?address=' . urlencode( $address )
				. '&sensor=true';
			$google_xml = simplexml_load_file( $request_uri );
			$lat = (string) $google_xml->result->geometry->location->lat;
			// fetching time from earth tools
			$lng = (string) $google_xml->result->geometry->location->lng;

			update_option( 'rsmt_latitude_two', $lat );
			update_option( 'rsmt_longitude_two', $lng );

		}
	}
}

add_filter( 'wp_head', array('LocalBusiness', 'visually_hidden' ) );
add_filter( 'wp_footer', array('LocalBusiness', 'show_local_business' ) );

$LocalBusiness = new LocalBusiness();
