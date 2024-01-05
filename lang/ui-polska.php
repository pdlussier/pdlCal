<?php
/*
= LuxCal lamguage file =

This file has been produced by LuxSoft. Please send comments / improvements to rb@luxsoft.eu.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","4.7.7");
define("ISOCODE","pl");

/* -- Titles on the Header of the Calendar and Date Picker -- */

$months = array("Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień");
$months_m = array("Sty","Lut","Mar","Kwi","Maj","Cze","Lip","Sie","Wrz","Paź","Lis","Gru");
$wkDays = array("Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota","Niedziela");
$wkDays_l = array("Nie","Pon","Wto","Śro","Czw","Pią","Sob","Nie");
$wkDays_m = array("Nie","Pon","Wto","Śro","Czw","Pią","Sob","Nie");
$wkDays_s = array("N","P","W","Ś","C","P","S","N");
$dhm = array("D","H","M"); //Days, Hours, Minutes


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Submit",
"log_in" => "Zaloguj",
"log_out" => "Wyloguj",
"none" => "None.",
"all_day" => "All day",
"back" => "Back",
"restart" => "Restart",
"by" => "by",
"of" => "of",
"max" => "max.",
"options" => "Options",
"done" => "Done",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"from" => "From", //e.g. from 9:30
"until" => "Until", //e.g. until 15:30
"open_calendar" => "Otwórz kalendarz",
"no_way" => "You are not authorized to perform this action",

//index.php
"title_log_in" => "Log In",
"title_profile" => "User profile",
"title_upcoming" => "Nadchodzące Wydarzenia",
"title_event" => "Wydarzenie",
"title_check_event" => "Check Event",
"title_search" => "Text Search",
"title_contact" => "Contact Form",
"title_thumbnails" => "Thumbnail Images",
"title_user_guide" => "Poradnik Użytkownika LuxCal",
"title_settings" => "Ustawień Kalendarza",
"title_edit_cats" => "Edycja Kategorie",
"title_edit_users" => "Edycja Użytkowników ",
"title_edit_groups" => "Edit User Groups",
"title_manage_db" => "Zarządzanie bazy danych",
"title_changes" => "Dodane / Edytowane / Usuniete Wydarzenia", 
"title_usr_import" => "User File Import - CSV format",
"title_usr_export" => "User File Export - CSV format",
"title_evt_import" => "Event File Import - CSV format",
"title_ics_import" => "Event File Import - iCal format",
"title_ics_export" => "Event File Export - iCal format",
"title_ui_styling" => "User Interface Styling",

//header.php
"hdr_button_back" => "Back to parent page",
"hdr_options_submit" => "When done click this header or 'Done'",
"hdr_options_panel" => "Options panel",
"hdr_select_date" => "Idź do Datę",
"hdr_calendar" => "Calendar",
"hdr_view" => "Widok",
"hdr_lang" => "Język",
"hdr_all_cats" => "wszystkich kategorii",
"hdr_all_groups" => "All Groups",
"hdr_all_users" => "wszyscy użytkownicy",
"hdr_go_to_view" => "Go to view",
"hdr_view_1" => "Rok",
"hdr_view_2" => "Miesiąc)",
"hdr_view_3" => "Work month",
"hdr_view_4" => "Tydzień",
"hdr_view_5" => "Work week",
"hdr_view_6" => "Dzień",
"hdr_view_7" => "Nadchodzące",
"hdr_view_8" => "Zmiany", 
"hdr_view_9" => "Matrix(C)",
"hdr_view_10" => "Matrix(U)",
"hdr_view_11" => "Gantt Chart",
"hdr_select_admin_functions" => "Wybierz funkcie admin",
"hdr_admin" => "Zarządzanie",
"hdr_settings" => "Ustawienia",
"hdr_categories" => "Kategorie",
"hdr_users" => "Użytkownicy",
"hdr_groups" => "User groups",
"hdr_database" => "Bazy danych",
"hdr_import_usr" => "User Import (CSV file)",
"hdr_export_usr" => "User Export (CSV file)",
"hdr_import_csv" => "Event Import (CSV file)",
"hdr_import_ics" => "Event Import (iCal file)",
"hdr_export_ics" => "Event Export (iCal file)",
"hdr_styling" => "Styling",
"hdr_back_to_cal" => "Back to calendar view",
"hdr_button_print" => "Pokaż",
"hdr_print_page" => "Pokaż tę stronę",
"hdr_button_contact" => "Contact",
"hdr_contact" => "Contact the administrator",
"hdr_button_tnails" => "Thumbnails",
"hdr_tnails" => "Show thumbnails",
"hdr_button_toap" => "Approve",
"hdr_toap_list" => "Events to be approved",
"hdr_button_todo" => "Todo",
"hdr_todo_list" => "Todo List",
"hdr_button_upco" => "Upcoming",
"hdr_upco_list" => "Nadchodzące Wydarzenia",
"hdr_button_search" => "Search",
"hdr_search" => "Text Search",
"hdr_button_add" => "Add",
"hdr_add_event" => "Dodaj Wydarzenie",
"hdr_button_help" => "Pomoc",
"hdr_user_guide" => "User Guide",
"hdr_gen_guide" => "General User Guide",
"hdr_cs_guide" => "Context-sensitive User Guide",
"hdr_gen_help" => "General help",
"hdr_prev_help" => "Previous help",
"hdr_open_menu" => "Open Menu",
"hdr_side_menu" => "Side Menu",
"hdr_today" => "dzisiaj", //dtpicker.js
"hdr_clear" => "kasuje", //dtpicker.js

//event.php
"evt_no_title" => "Brak tytułu",
"evt_no_start_date" => "Brak daty rozpoczęcia",
"evt_bad_date" => "Zła data",
"evt_bad_rdate" => "Zła repeat end data",//
"evt_no_start_time" => "Brak czasu rozpoczęcia",
"evt_bad_time" => "Zła godzina",
"evt_end_before_start_time" => "Czas zakończenia przed czasem rozpoczęcia",
"evt_end_before_start_date" => "Data zakończenia przed datą rozpoczęcia",
"evt_until_before_start_date" => "Repeat end przed datą rozpoczęcia",
"evt_default_duration" => "Default event duration of $1 hours and $2 minutes",
"evt_fixed_duration" => "Fixed event duration of $1 hours and $2 minutes",
"evt_approved" => "Event approved",
"evt_apd_locked" => "Event approved and locked",
"evt_title" => "Tytuł",
"evt_venue" => "Miejsce",
"evt_address_button" => "An address between ! marks will become a button",
"evt_category" => "Kategoria",
"evt_subcategory" => "Subcategory",
"evt_description" => "Opis",
"evt_attachments" => "Attachments",
"evt_attach_file" => "Attach file",
"evt_click_to_open" => "Click to open",
"evt_click_to_remove" => "Click to remove",
"evt_no_pdf_img_vid" => "Attachment should be pdf, image or video",
"evt_error_file_upload" => "Error uploading file",
"evt_upload_too_large" => "Uploaded file too large",
"evt_date_time" => "Data / godzina",
"evt_private" => "Wydarzenie prywatne",
"evt_start_date" => "Początek",
"evt_end_date" => "Koniec",
"evt_select_date" => "Wybierz datę",
"evt_select_time" => "Wybierz czas",
"evt_all_day" => "Całodniowe",
"evt_change" => "Zmień",
"evt_set_repeat" => "Ustaw powtórzenie",
"evt_set" => "OK",
"evt_help" => "help",
"evt_repeat_not_supported" => "Specified repetition not supported",//
"evt_no_repeat" => "Bez powtórzeń",
"evt_repeat_on" => "Powtarzaj każde",
"evt_until" => "Aż do",
"evt_blank_no_end" => "Puste: bez końca",
"evt_each_month" => "each month",
"evt_interval2_1" => "Pierwszy", 
"evt_interval2_2" => "Drugi", 
"evt_interval2_3" => "Trzeci", 
"evt_interval2_4" => "Czwarty", 
"evt_interval2_5" => "Ostatni", 
"evt_period1_1" => "Dzień", 
"evt_period1_2" => "Tydzień", 
"evt_period1_3" => "Miesiąc", 
"evt_period1_4" => "Rok", 
"evt_send_eml" => "Wyślij maila",
"evt_send_sms" => "Send SMS",
"evt_now_and_or" => "now and/or",
"evt_event_added" => "The following event has been added",
"evt_event_edited" => "The following event has been modified",
"evt_event_deleted" => "The following event has been deleted",
"evt_event_approved" => "Approved event",
"evt_days_before_event" => "dni przed wydarzeniem",
"evt_to" => "Do",
"evt_not_help" => "List of recipient addresses separated by semicolons. A recipient address can be a user name, an email address, a mobile phone number or, between square brackets, the name of a file with addresses in the \'reciplists\' directory, with one address (a user name, an email address or a mobile phone number) per line. When omitted, the default file extension is .txt.<br>Maximum field length: 255 characters.",
"evt_eml_help" => "Unless terminated with a $-sign, mobile phone numbers will be used to find the corresponding email address in the database. If not found, no email will be sent to this recipient.",
"evt_sms_help" => "Unless terminated with a $-sign, email addresses will be used to find the corresponding mobile phone number in the database. If not found, no SMS will be sent to this recipient.",
"evt_recip_list_too_long" => "Lista adresów zawiera zbyt dużo znaków",
"evt_no_recip_list" => "Brak powiadamiającego adresu/adresów",
"evt_not_in_past" => "Notification date in past",
"evt_not_days_invalid" => "Notification days invalid",
"evt_status" => "Status",
"evt_descr_help" => "The following items can be used in the description fields ...<br>• HTML tags &lt;b&gt;, &lt;i&gt;, &lt;u&gt; and &lt;s&gt; for bold, italic, underlined and striked-through text.",
"evt_descr_help_img" => "• small images (thumbnails) in the following format: \'image_name.ext\'. The thumbnail files, with file extension .gif, .jpg or .png, must be present in \'thumbnails\' folder. If enabled, the Thumbnails page can be used to upload thumbnail files.",
"evt_descr_help_eml" => "• Mailto-links in the following format: \'email address\' or \'email address [name]\', where \'name\' will be the title of the hyperlink. E.g. xxx@yyyy.zzz [For info click here].",
"evt_descr_help_url" => "• URL links in the following format: \'url\' or \'url [name]\', where \'name\' will be the title of the link. E.g. https://www.google.com [search].",
"evt_confirm_added" => "wydarzenie dodał",
"evt_confirm_saved" => "wydarzenie zapisane",
"evt_confirm_deleted" => "wydarzenie usunieta",
"evt_add_close" => "Add and close",
"evt_add" => "Dodaj",
"evt_edit" => "Edycja",
"evt_save_close" => "Zapisz i zamknij",
"evt_save" => "Zapisz",
"evt_clone" => "Zapisz jako nowy ",
"evt_delete" => "Usuń",
"evt_close" => "Zamknij",
"evt_added" => "Dodany",
"evt_edited" => "Uaktualniony",
"evt_is_repeating" => "is a repeating event.",
"evt_is_multiday" => "is a multi-day event.",
"evt_edit_series_or_occurrence" => "Do you want to edit the series or this occurrence?",
"evt_edit_series" => "Edit the series",
"evt_edit_occurrence" => "Edit this occurrence",

//views
"vws_add_event" => "Dodaj Wydarzenie",
"vws_edit_event" => "Edit Event",
"vws_see_event" => "See event details",
"vws_view_month" => "Podgląd Miesięczny",
"vws_view_week" => "Podgląd Tygodniowy",
"vws_view_day" => "Podgląd Dzienny",
"vws_click_for_full" => "for full calendar click month",
"vws_view_full" => "View full calendar",
"vws_prev_month" => "Previous month",
"vws_next_month" => "Next month",
"vws_today" => "Dziś",
"vws_back_to_today" => "Powrót na miesiąc dzisiaj",
"vws_back_to_main_cal" => "Back to the main calendar month",
"vws_week" => "Tydzień",
"vws_wk" => "ty",
"vws_time" => "godzina",
"vws_events" => "Wydarzenia",
"vws_all_day" => "Cały Dzień",
"vws_earlier" => "Earlier",
"vws_later" => "Later",
"vws_venue" => "Miejsce",
"vws_address" => "Address",
"vws_events_for_next" => "Nadchodzące Wydarzenia na następne",
"vws_days" => "dzień/dni",
"vws_added" => "Dodany",
"vws_edited" => "Uaktualniony",
"vws_notify" => "Powiadom",
"vws_none_due_in" => "No events due in the next",
"vws_evt_cats" => "Event categories",
"vws_cal_users" => "Calendar users",
"vws_no_users" => "No users in selected group(s)",
"vws_start" => "Start",
"vws_duration" => "Duration",
"vws_no_events_in_gc" => "No events in the selected period",
"vws_download" => "Download",
"vws_download_title" => "Download a text file with these events",
"vws_send_mail" => "Send email",
"vws_send_mail_to" => "Send email to",

//changes.php
"chg_from_date" => "Data początkowa",
"chg_select_date" => "Wybierz datę początkową", 
"chg_notify" => "Powiadom",
"chg_days" => "Dzień/Dni",
"chg_added" => "Dodany",
"chg_edited" => "Uaktualniony",
"chg_deleted" => "Usunięty",
"chg_changed_on" => "Changed on",
"chg_changes" => "Changes",
"chg_no_changes" => "Brak changes.",

//search.php
"sch_define_search" => "Define Search",
"sch_search_text" => "Search text",
"sch_event_fields" => "Event fields",
"sch_all_fields" => "All fields",
"sch_title" => "Title",
"sch_description" => "Description",
"sch_venue" => "Venue",
"sch_user_group" => "User group",
"sch_event_cat" => "Event category",
"sch_all_groups" => "All Groups",
"sch_all_cats" => "All Categories",
"sch_occurring_between" => "Occurring between",
"sch_select_start_date" => "Select start date",
"sch_select_end_date" => "Select end date",
"sch_search" => "Search",
"sch_invalid_search_text" => "Search text missing or too short",
"sch_bad_start_date" => "Bad start date",
"sch_bad_end_date" => "Bad end date",
"sch_no_results" => "No results found",
"sch_new_search" => "New Search",
"sch_calendar" => "Go to calendar",
"sch_extra_field1" => "Extra field 1",
"sch_extra_field2" => "Extra field 2",
"sch_sd_events" => "Single-day events",
"sch_md_events" => "Multi-day events",
"sch_rc_events" => "Recurring events",
"sch_instructions" =>
"<h3>Text Search Instructions</h3>
<p>The calendar database can be searched for events matching specific text.</p>
<br><p><b>Search text</b>: The selected fields (see below) of each event will 
be searched. The search is case insensitive.</p>
<p>Two wildcard characters can be used:</p>
<ul>
<li>Underscore characters (_) in the search text will match any single 
character.<br>E.g.: '_e_r' matches 'beer', 'dear', 'heir'.</li>
<li>Ampersand characters (&amp;) in the search text will match any number of 
characters.<br>E.g.: 'de&amp;r' matches 'December', 'dear', 'developer'.</li>
</ul>
<br><p><b>Event fields</b>: The selected fields will be searched only.</p>
<br><p><b>User group</b>: Events in the selected user group will be searched 
only.</p>
<br><p><b>Event category</b>: Events in the selected category will be searched 
only.</p>
<br><p><b>Occurring between</b>: The start and end date are both optional. A 
blank start date means: one year from now in the past and a blank end date 
means: one year from now in the future.</p>
<br><p>To avoid repetitions of the same event, the search results will be split 
in single-day events, multi-day events and recurring events.</p>
<p>The search results will be displayed in chronological order.</p>",

//thumbnails.php
"tns_man_tnails_instr" => "Manage Thumbnails Instructions",
"tns_help_general" => "The images below can be used in the calendar views, by inserting their filename in the event's description field or in one of the extra fields. An image file name can be copied to the clipboard by clicking the desired thumbnail below; subsequently, in the Event window, the image name can be inserted in one of the fields by typing CTRL-V. Under each thumbnail you will find: the file name (without the user ID prefix), the file date and between brackets the last date the thumbnail is used by the calendar.",
"tns_help_upload" => "Thumbnails can be uploaded from your local computer by selecting the Browse button. To select multiple files, hold down the CTRL or SHIFT key while selecting (max. 20 at a time). The following file types are accepted: $1. Thumbnails with a size greater than $2 x $3 pixels (w x h) will be resized automatically.",
"tns_help_delete" => "Thumbnails with a red cross in the upper left corner can be deleted by selecting this cross. Thumbnails without red cross can not be deleted, because they are still used after $1. Caution: Deleted thumbnails cannot be retrieved!",
"tns_your_tnails" => "Your thumbnails",
"tns_other_tnails" => "Other thumbnails",
"tns_man_tnails" => "Manage Thumbnails",
"tns_sort_by" => "Sort by",
"tns_sort_order" => "Sort order",
"tns_search_fname" => "Search file name",
"tns_upload_tnails" => "Upload thumbnails",
"tns_name" => "name",
"tns_date" => "date",
"tns_ascending" => "ascending",
"tns_descending" => "descending",
"tns_not_used" => "not used",
"tns_infinite" => "infinite",
"tns_del_tnail" => "Delete thumbnail",
"tns_tnail" => "Thumbnail",
"tns_deleted" => "deleted",
"tns_tn_uploaded" => "thumbnail(s) uploaded",
"tns_overwrite" => "allow overwriting",
"tns_tn_exists" => "thumbnail already exists – not uploaded",
"tns_upload_error" => "upload error",
"tns_no_valid_img" => "is no valid image",
"tns_file_too_large" => "file too large",
"tns_resized" => "resized",
"tns_resize_error" => "resize error",

//contact.php
"con_msg_to_admin" => "Message to the Administrator",
"con_from" => "From",
"con_name" => "Name",
"con_email" => "Email",
"con_subject" => "Subject",
"con_message" => "Message",
"con_send_msg" => "Send message",
"con_fill_in_all_fields" => "Please fill in all fields",
"con_invalid_name" => "Invalid name",
"con_invalid_email" => "Invalid email address",
"con_no_urls" => "No web links allowed in the message",
"con_mail_error" => "Email problem. The message could not be sent. Please try again later.",
"con_con_msg" => "Contact message from the calendar",
"con_thank_you" => "Thank you for your message to the calendar",
"con_get_reply" => "You will receive a reply to your message as soon as possible",
"con_date" => "Date",
"con_your_msg" => "Your message",
"con_your_cal_msg" => "Your message to the calendar",
"con_has_been_sent" => "has been sent to the calendar administrator",
"con_confirm_eml_sent" => "A confirmation email has been sent to",

//alert.php
"alt_message#0" => "If you don't use the calendar\\nyour session will soon expire!",
"alt_message#1" => "PHP SESSION EXPIRED",
"alt_message#2" => "Please restart the Calendar",
"alt_message#3" => "INVALID REQUEST",

//stand-alone sidebar (lcsbar.php)
"ssb_upco_events" => "Upcoming Events",
"ssb_all_day" => "All day",
"ssb_none" => "No events."
);
?>
