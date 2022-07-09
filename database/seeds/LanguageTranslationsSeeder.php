<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Translation;
class LanguageTranslationsSeeder extends Seeder
{
  public function run(){

    DB::table('translations')->truncate();

    $sw = [
    "lbl_site_title"              => "Ofisi ya Taifa ya Mashtaka",
    "lbl_title_ministry"      =>   "Ofisi ya Taifa ya Mashtaka",
    "lbl_site_subtitle"      =>   "Jamhuri ya Muungano wa Tanzania",
    "lbl_feedback"                => "Mrejesho, Malalamiko au Wazo",
    "lbl_contact"                 => "Wasiliana Nasi",
  
    "lbl_social"                => "Mitandao ya Kijamii",
    "lbl_faq"                 => "Maswali Yaulizwayo Mara kwa Mara",
    "lbl_faq_short"                 => "Maswali",
    "lbl_our_services"  => "Huduma Zetu",
    "lbl_faq_short"               => "Maswali",
    "lbl_sitemap"               => "Ramani Ya Tovuti",
    "lbl_languge"         => "Kiswahili",
    "lbl_details"         => "Maelezo",
    "lbl_profile"         => "Wasifu",
    "lbl_results"         => "Matokeo",

    "lbl_announcements"          => "Matangazo",
    "lbl_recent_news_events"      =>    "Habari na Matukio",
    "lbl_recent_press"      =>    "Taarifa kwa vyombo vya habari",

      /*........................................................
      . Front page labels                                         .
      ..........................................................*/

      "lbl_events_calender"           => "Kalenda ya Matukio",

      "lbl_events_date"             => "Tarehe ya Tukio",
      "lbl_latest_news"               => "Habari Mpya",
      "lbl_latest_products"           => "Products Mpya",
      "lbl_latest_publications"       => "Machapisho Mapya",
      "lbl_news"            => "Habari",
      "lbl_events"      => "Matukio",
      "lbl_document"      => "Document",
      "lbl_more"            => "Zaidi",
      "lbl_more_news"               => "Habari Zaidi",
      "lbl_more_events"               => "Matukio Zaidi",
      "lbl_more_gallery"              => "Maktaba zote",
      "lbl_more_products"             => "Product zaid",
      "lbl_more_publications"         => "More publications",
      "lbl_more_announcements"    => "Matangazo Zaidi",

      "lbl_results"         => "Matokeo",
      "lbl_related_links"       => "Tovuti Mashuhuri",
      "lbl_quick_links"       => "Kurasa za Karibu",
      "lbl_readmore"          => "Soma zaidi",
      "lbl_view_all_news"          => "Soma Habari zaidi",
      "lbl_view_all_archieve_video"    => "Tazama Video Zilizohifadhiwa",
      "msg_under_construction"    => "Kazi Inaendelea ...",
      "lbl_more_adverts"        => "Matangazo Mengine",
      "lbl_home"            => "Mwanzo",
      "lbl_category"          => "Makundi",
      "lbl_posts"           => "Posts(KISWAHILI)",
      "lbl_pages"           => "Kurasa",
      "lbl_speeches"          => "Speeches",
      "lbl_upcoming"          => "Tukio Lijalo",
      "lbl_how_doi"              => "Nifanyaje?",
      "lbl_guidelines"              => "Miongozo",
      "lbl_about_us"              => "Kuhusu Wizara",


      "lbl_products"          => "Kazi",
      "lbl_publications"        => "Machapisho",
      "lbl_no_information"            =>  "Hakuna Taarifa kwa sasa ",
      "lbl_modified"          => "Date Modified(SW)",
      "lbl_more_docs"         => "Mafaili Zaidi",
      "lbl_more_products"       => "kazi mpya Zaidi",
      "lbl_prev"            => "Nyuma",
      "lbl_next"            => "Mbele",
      "lbl_album"           => "Albamu",
      "lbl_vids"            => "Video",
      "lbl_error"           => "Taarifa hazijapatikana",
      "lbl_tbl_name"          => "Jina la Chapisho",
      "lbl_tbl_size"          => "Saizi",
      "lbl_tbl_date"          => "Tarehe",
      "lbl_location"          => "Mahali",
      "lbl_desc"            => "Maelezo",
      "lbl_title"           => "Jina",
      "lbl_time"            => "MUDA",
      'postpone'            => "Imearishwa",
      'cancelled'           => "Limesitishwa",
      'active'            => "",
      'lbl_press'           => "vyombo vya habari",
      'lbl_posted'          => "Imewekwa",
      'watch'             => "Angalia",
      "lbl_biography"           => "Wasifu",
      "bio"             => "bio_sw",
      "lbl_address"         => "Anwani/Mahali",
      "lbl_event_type"        => "AINA",

      /*........................................................
      . Footer page labels                                         .
      ..........................................................*/
      "lbl_more_videos"         => "Video Zingine",
      "lbl_copyright"         => "Haki zote zimehifadhiwa.",
      "lbl_copyright_statement"         => "Copy Right Statements.",
      "lbl_tenders"         => "Zabuni",
      "lbl_to"            => "Mpaka",
      "lbl_tbl_name_tenders"      => "Jina la Zabuni",
      "lbl_terms_conditions"      => "Terms and Conditions",


      /*........................................................
      . Footer page labels                                         .
      ..........................................................*/
      "lbl_download"          => "Pakua",
      "lbl_more_download"          => "Pakua Zaidi",


      /*........................................................
      . front Media labels                                         .
      ..........................................................*/
      "lbl_photo_gallery"         => "Maktaba ya Picha",
      "lbl_video_gallery"         => "Maktaba ya Video",
      "lbl_audio_gallery"         => "Maktaba ya Audio",
      "lbl_speeches"            => "Hotuba",
      "lbl_archies"           => "Archieve",
      "lbl_media_center"          => "Ukumbi wa Habari",
      



      /*........................................................
      . Form labels                                         .
      ..........................................................*/
      "lbl_name"              => "Jina",
      "lbl_email"             => "Barua pepe",
      "lbl_phone"             => "Simu",
      "lbl_fax"               => "Nukushi",
      "lbl_message"             => "Ujumbe",
      "lbl_send"              => "Tuma",
      "lbl_mail"              => "Barua Pepe",
      "lbl_search"            => "Tafuta",
      "lbl_search_results"        => "Matokeo",
      "lbl_search1"           => "Andika Unachokitafuta Hapa Kisha bonyeza kitufe",

      "lbl_mobile"      =>   "Simu ya Mkononi",
      "lbl_telephone"      =>   "Telephone",
      "lbl_p.o.box" =>   "S.L.P",
      "lbl_comments" =>   "Maoni",
      "lbl_remarks" => "Remarks",
      "lbl_complains" => "Malalamiko",
      "latest_downloads" => "Latest Downloads",
      "stakeholders" => "Wadau",
      "privacy_policy" => "Sera ya Faragha",
      "disclaimer" => "Angalizo",
      "latest_announcements" => "Matangazo ya Karibuni",
      "time" => "Muda",
      "lbl_thanks_message" => "Aksante kwa kuwasiliana nasi, ujumbe wako umetumwa kikamilifu",
      "location" => "Mahali",
      "lbl_policy"=>"Sera ya Faragha",
      "lbl_dis"=>"Mikatazo",

      "lbl_videos_gallery"=>"Albamu ya Video",
      "lbl_vacancies" => "Ajira",
      "lbl_deadline" => "Tarehe ya Mwisho",
      "lbl_videos_gallery"=>"Albamu ya Video",
      "lbl_more_videos"  => "Video Zaidi",
      "lbl_administration" => "Utawala",
      "lbl_management" => "Menejimenti",
      "lbl_welcome_note" => "Karibu",
      "lbl_contact_info" => "Mawasiliano",

      "lbl_latest_speeches"=>"Speeches za hivi karibuni",
      "lbl_view_more"=>"Angalia Zaidi",
      "lbl_fullname"=>"Jina Kamili",
      "lbl_subject"=>"Kichwa cha Habari",
      "lbl_call_us" =>"Tupigie",
      "lbl_hotline" =>"Hotline",
      "lbl_view" =>"View",
      "lbl_organization" =>"Organaizesheni",
      "lbl_contacts" =>"Contacts",
      "lbl_wish_to_attend" =>"Una hitaji kuhudhuria? Tafadhari bonyeza linki hapo chini kujisajili",
      "lbl_post_held" =>"Post Held",
      "lbl_family_name" =>"Jina la Ukoo",
      "lbl_other_names" =>"Majina Mengine",
      "lbl_title" =>"Title",
      "lbl_male" =>"Mwanaume",
      "lbl_female" =>"Mwanamke",
      "lbl_gender" =>"Jinsia",
      "lbl_nb" =>"NB",
      "lbl_mandatory" =>" Input fields marked with asterisk (✵) denotes mandatory fields.",
      "lbl_booking" =>"Booking form for those wishing to attend",
      "lbl_number" =>"Namba",
      "lbl_expectations" =>"Matarajio",
      "lbl_event_fee" =>"Ada ya Tukio",
      "lbl_venue" =>"Ukumbi",
      "lbl_duration" =>"Muda",
      "lbl_objectives" =>"Madhumuni",
      "lbl_contents" =>"Event Contents",
      "lbl_participants" =>"Washiriki",
      "lbl_event_fee_details" =>"Maelezo ya Kozi",
      "lbl_ceo" =>"Mtendaji Mkuu wa Taasisi",
      "lbl_board_members" =>"Wajumbe wa Bodi",
      "lbl_directors" =>"Wakurugenzi",
      "lbl_heads" =>"Wakuu wa Vitengo",
      "lbl_managers" =>"Mameneja",
      "lbl_projects" =>"Miradi",
      "lbl_departments" =>"Idara",
      "lbl_notice_board" => "Notes Board",
      "lbl_judgement_cases" => "Prosecution Judgments/Cases",
      ];

      $en = [
      "lbl_site_title"              => "Ofisi ya Taifa ya Mashtaka",

      "lbl_title_ministry"      =>   "Ofisi ya Taifa ya Mashtaka",
      "lbl_site_subtitle"      =>   "The United Republic of Tanzania",
      "lbl_feedback"                => "Feedback, Complaint or Opinion:",
      "lbl_search_results_count"                 => "Count  ",

      "lbl_contact"                 => "Contact Us",
      "lbl_thanks_message" => "Thank you for contacting us. Your message sent successfully",
      "lbl_search_results_for"                 => "Search results for ",
      "lbl_faq"                 => "Frequently Asked Questions",
      "lbl_faq_short"                 => "FAQs",
      "lbl_our_services"  => "Our Services",
      "lbl_faq_short"               => "F.A.Q's",
      "lbl_social"                => "Social Media",
      "lbl_results"         => "Results",
      "lbl_languge"         => "English",
      "lbl_home"            => "Home",
      "lbl_category"          => "Category",
      "lbl_posts"           => "Posts",
      "lbl_upcoming"          => "Upcoming Event",
      "lbl_more"            => "More",
      "lbl_more_announcements"    => "More Announcements",
      "lbl_details"         => "Details",
      "lbl_profile"         => "Profile",
      "lbl_results"         => "Results",

      "lbl_recent_news_events"      =>    "Recent News and Events",
      "lbl_recent_press"      =>    "Press releases",



      "lbl_sitemap"               => "Sitemap",
      "lbl_products"          => "Products",
      "lbl_publications"        => "Publications",
      "lbl_no_information"            =>  "Content not found ",
      "lbl_modified"          => "Date Modified",
      "lbl_prev"            => "Previous",
      "lbl_next"            => "Next",
      "lbl_album"           => "Albums",
      "lbl_vids"            => "Videos",
      "lbl_error"           => "Content Not Found",
      "lbl_pages"           => "Pages",
      "lbl_speeches"          => "Speeches",
      "lbl_tbl_name"          => "Publication Name",
      "lbl_tbl_name_tenders"      => "Tender Title",
      "lbl_tbl_size"          => "Size",
      "lbl_tbl_date"          => "Date",
      "lbl_location"          => "Location",
      "lbl_desc"            => "Description",
      "lbl_title"           => "Title",
      "lbl_time"            => "TIME",
      'postpone'            => "Postponed",
      'cancelled'           => "Cancelled",
      'watch'             => "Watch",
      'active'            => "",
      "lbl_biography"           => "Biography",
      "bio"             => "bio_en",
      "lbl_announcements"          => "Announcements",


      /*........................................................
      . front page labels                                         .
      ..........................................................*/
      "lbl_events_calender"           => "Events Calendar",
      "lbl_events_date"             => "Event Date",
      "lbl_latest_news"               => "Latest News",
      "lbl_latest_products"           => "Latest Products",
      "lbl_latest_publications"       => "Latest Publications",
      "lbl_news"                  => "News",
      "lbl_events"      => "Events",
      "lbl_document"      => "Document",
      "lbl_more_news"               => "More News",
      "lbl_more_events"               => "More Events",
      "lbl_more_gallery"              => "More Gallery",
      "lbl_more_products"             => "More Products",
      "lbl_more_publications"         => "More publications",
      "lbl_related_links"       => "Related Links",
      "lbl_quick_links"       => "Quick Links",
      "lbl_readmore"          => "Read More",
      "lbl_view_all_news"          => "View All News",
      "lbl_view_all_archieve_video"          => "View All Archieve Video",
      "msg_under_construction"    => "Under Construction ...",
      "lbl_more_adverts"        => "More Adverts",
      "lbl_more_docs"         => "More Docs",
      "lbl_more_products"       => "More Products",
      "lbl_press"           => "Press Release",
      "lbl_posted"          => "Posted On",
      "lbl_search"          => "Search",
      "lbl_search_results"      => "Search Results",
      "lbl_search1"         => "Type your search here then press ENTER",
      "lbl_tenders"         => "Tenders",
      "lbl_to"            => "To",
      "lbl_address"         => "Postal Address",
      "lbl_event_type"        => "EVENT TYPE",


      /*........................................................
      . Footer page labels                                         .
      ..........................................................*/
      "lbl_more_videos"         => "More Videos",
      "lbl_copyright"         => "All Rights Reserved.",
      "lbl_copyright_statement"         => "Copy Right Statements.",
      "lbl_terms_conditions"      => "Terms and Conditions",


      /*........................................................
      . Footer page labels                                         .
      ..........................................................*/
      "lbl_download"          => "Download",



      /*........................................................
      . front Media labels                                         .
      ..........................................................*/
      "lbl_photo_gallery"         => "Photo Gallery",
      "lbl_video_gallery"         => "Video Gallery",
      "lbl_audio_gallery"         => "Audio Gallery",
      "lbl_speeches"            => "Speeches",
      "lbl_archies"           => "Archieve",
      "lbl_media_center"          => "Media Center",

      /*........................................................
      . Form labels                                         .
      ..........................................................*/
      "lbl_name"              => "Name",
      "lbl_email"             => "Email Address",
      "lbl_phone"             => "Phone",
      "lbl_fax"               => "Fax",
      "lbl_message"             => "Message",
      "lbl_send"              => "Send",
      "lbl_mail"              => "Staff Mail",

      "lbl_how_doi"              => "How Do I?",
      "lbl_guidelines"              => "Guidelines",
      "lbl_about_us"              => "About us", 
      "lbl_mobile"      =>   "Mobile",
      "lbl_telephone"      =>   "Telephone",
      "lbl_p.o.box" =>   "P.O Box",
      "lbl_comments" =>   "Comments",
      "lbl_remarks" => "Remarks",

      
      "lbl_complains" => "Complains",
      "latest_downloads" => "Latest Downloads",
      "stakeholders" => "Stakeholders",
      "privacy_policy" => "Privacy Policy",
      "disclaimer" => "Disclaimer",
      "latest_announcements" => "Latest Announcements",
      "time" => "Time",
      "location" => "Location",
      "lbl_policy"=>"Privacy Policy",
      "lbl_dis"=>"Disclaimers",


      "lbl_videos_gallery"=>"Video Albums",
      "lbl_vacancies" => "Vacancies",
      "lbl_deadline" => "Deadline",
      "lbl_more_videos"  => "More Videos",
      "lbl_administration" => "Administration",
      "lbl_management" => "Management",

      "lbl_welcome_note" => "Welcome Note",
      "lbl_contact_info" => "Contact Info",
      "lbl_latest_speeches"=>"Latest Speeches",
      "lbl_view_more"=>"View More",
      "lbl_fullname"=>"Fullname",
      "lbl_subject"=>"Subject",
      "lbl_more_download"=>"More Downloads",
      "lbl_call_us" =>"Call Us",
      "lbl_hotline" =>"Hotline",
      "lbl_view" =>"View",
      "lbl_organization" =>"Organization",
      "lbl_contacts" =>"Contacts",
      "lbl_post_held" =>"Post Held",
      "lbl_wish_to_attend" =>"Do you wish to attend? Please click the button below to register",
      "lbl_family_name" =>"Family Name",
      "lbl_other_names" =>"Other Names",
      "lbl_title" =>"Title",
      "lbl_male" =>"Male",
      "lbl_female" =>"Female",
      "lbl_gender" =>"Gender",
      "lbl_nb" =>"NB",
      "lbl_mandatory" =>" Input fields marked with asterisk (✵) denotes mandatory fields.",
      "lbl_booking" =>"Booking form for those wishing to attend",
      "lbl_number" =>"Number",
      "lbl_expectations" =>"Expectations",
      "lbl_event_fee" =>"Event Fee",
      "lbl_venue" =>"Venue",
      "lbl_duration" =>"Duration",
      "lbl_objectives" =>"Objectives",
      "lbl_contents" =>"Event Contents",
      "lbl_participants" =>"Participants",
      "lbl_event_fee_details" =>"Course Fee Details",
      "lbl_ceo" =>"CHIEF EXECUTIVE OFFICER (CEO)",
      "lbl_board_members" =>"Board Members",
      "lbl_directors" =>"DIRECTORS",
      "lbl_heads" =>"HEADS OF UNITS",
      "lbl_managers" =>"MANAGERS",
      "lbl_projects" =>"Projects",
      "lbl_departments" =>"Idara",
      "lbl_notice_board" => "Notes Board",
      "lbl_judgement_cases" => "Prosecution Judgments/Cases",
      ];

      foreach ($sw as $key => $value) {

        $data['en']=$en[$key];
        $data['keyword']=$key;
        $data['sw']=$value;
        $date = date('Y-m-d H:i:s');
        $data['created_at']=$date;
        $data['updated_at']=$date;
        $infos[] = $data;
      }

      Translation::insert($infos);
    }

  }