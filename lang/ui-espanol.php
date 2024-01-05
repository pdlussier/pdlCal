<?php
/*
= LuxCal user interface language file =

Traducido al español por Michel Trottier y su novia - Montreal, Canada.
Traducción corregida y actualizada por Pantricio - Murcia, España.

This file is part of the LuxCal Web Calendar.
*/

//LuxCal ui language file version
define("LUI","4.7.7");
define("ISOCODE","es");

/* -- Titles on the Header of the Calendar -- */

$months = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
$months_m = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
$wkDays = array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
$wkDays_l = array("Dom","Lun","Mar","Mié","Jue","Vie","Sáb","Dom");
$wkDays_m = array("Do","Lu","Ma","Mi","Ju","Vi","Sá","Do");
$wkDays_s = array("D","L","M","X","J","V","S","D");
$dhm = array("D","H","M"); //Days, Hours, Minutes


/* -- User Interface texts -- */

$xx = array(

//general
"submit" => "Enviar",
"log_in" => "Iniciar sesión",
"log_out" => "Cerrar sesión",
"none" => "Ninguno.",
"all_day" => "All day",
"back" => "Volver",
"restart" => "Restart",
"by" => "by",
"of" => "de",
"max" => "max.",
"options" => "Opciones",
"done" => "Done",
"at_time" => "@", //date and time separator (e.g. 30-01-2020 @ 10:45)
"from" => "From", //e.g. from 9:30
"until" => "Until", //e.g. until 15:30
"open_calendar" => "Abrir el calendario",
"no_way" => "You are not authorized to perform this action",

//index.php
"title_log_in" => "Log In",
"title_profile" => "User profile",
"title_upcoming" => "Próximos eventos", 
"title_event" => "Evento",
"title_check_event" => "Marcar evento",
"title_search" => "Buscar texto",
"title_contact" => "Contact Form",
"title_thumbnails" => "Thumbnail Images",
"title_user_guide" => "Guía del usuario de LuxCal",
"title_settings" => "Configurar el calendario", 
"title_edit_cats" => "Modificar categorías",
"title_edit_users" => "Modificar usuarios",
"title_edit_groups" => "Edit User Groups",
"title_manage_db" => "Gestionar la base de datos",
"title_changes" => "Eventos añadidos / modificados / suprimidos",
"title_usr_import" => "Importación Usuarios - CSV format",
"title_usr_export" => "Exportación Usuarios - CSV format",
"title_evt_import" => "Importación Eventos - CSV format",
"title_ics_import" => "Importación Eventos - iCal format",
"title_ics_export" => "Exportación Eventos - iCal format",
"title_ui_styling" => "User Interface Styling",

//header.php
"hdr_button_back" => "Back to parent page",
"hdr_options_submit" => "Seleccione una opción y pulse 'Done'",
"hdr_options_panel" => "Panel de opciones",
"hdr_select_date" => "Ir a Fecha",
"hdr_calendar" => "Calendario",
"hdr_view" => "Vista",
"hdr_lang" => "Idioma",
"hdr_all_cats" => "Todas las categorías",
"hdr_all_groups" => "All Groups",
"hdr_all_users" => "Todos los usuarios",
"hdr_go_to_view" => "Go to view",
"hdr_view_1" => "Año",
"hdr_view_2" => "Mes",
"hdr_view_3" => "Mes laboral",
"hdr_view_4" => "Semana",
"hdr_view_5" => "Semana laboral",
"hdr_view_6" => "Día",
"hdr_view_7" => "Próximos",
"hdr_view_8" => "Cambios",
"hdr_view_9" => "Matrix(C)",
"hdr_view_10" => "Matrix(U)",
"hdr_view_11" => "Gantt Chart",
"hdr_select_admin_functions" => "Seleccionar función de administración",
"hdr_admin" => "Administración",
"hdr_settings" => "Configuración",
"hdr_categories" => "Categorías",
"hdr_users" => "Usuarios",
"hdr_groups" => "User groups",
"hdr_database" => "Base de datos",
"hdr_import_usr" => "Importar Usuarios (CSV file)",
"hdr_export_usr" => "Exportar Usuarios (CSV file)",
"hdr_import_csv" => "Importar Eventos (CSV file)",
"hdr_import_ics" => "Importar Eventos (iCal file)",
"hdr_export_ics" => "Exportar Eventos (iCal file)",
"hdr_styling" => "Styling",
"hdr_back_to_cal" => "Back to calendar view",
"hdr_button_print" => "Imprimir",
"hdr_print_page" => "Imprima esta página",
"hdr_button_contact" => "Contact",
"hdr_contact" => "Contact the administrator",
"hdr_button_tnails" => "Thumbnails",
"hdr_tnails" => "Show thumbnails",
"hdr_button_toap" => "Approve",
"hdr_toap_list" => "Events to be approved",
"hdr_button_todo" => "Todo",
"hdr_todo_list" => "Lista de pendientes",
"hdr_button_upco" => "Upcoming",
"hdr_upco_list" => "Próximos eventos",
"hdr_button_search" => "Search",
"hdr_search" => "Buscar",
"hdr_button_add" => "Add",
"hdr_add_event" => "Añadir Evento",
"hdr_button_help" => "Ayuda",
"hdr_user_guide" => "User Guide",
"hdr_gen_guide" => "General User Guide",
"hdr_cs_guide" => "Context-sensitive User Guide",
"hdr_gen_help" => "General help",
"hdr_prev_help" => "Previous help",
"hdr_open_menu" => "Open Menu",
"hdr_side_menu" => "Side Menu",
"hdr_today" => "hoy", //dtpicker.js
"hdr_clear" => "borrar", //dtpicker.js

//event.php
"evt_no_title" => "Sin título",
"evt_no_start_date" => "No hay fecha de inicio",
"evt_bad_date" => "Fecha errónea",
"evt_bad_rdate" => "Fecha final de repetición erronea",
"evt_no_start_time" => "No hay hora de inicio",
"evt_bad_time" => "Hora incorrecta",
"evt_end_before_start_time" => "Hora de finalización anterior a la hora de inicio",
"evt_end_before_start_date" => "Fecha de finalización anterior a la fecha de inicio",
"evt_until_before_start_date" => "Fecha final de repetición anterior a la fecha de inicio",
"evt_default_duration" => "Default event duration of $1 hours and $2 minutes",
"evt_fixed_duration" => "Fixed event duration of $1 hours and $2 minutes",
"evt_approved" => "Event approved",
"evt_apd_locked" => "Event approved and locked",
"evt_title" => "Título",
"evt_venue" => "Ubicación del evento",
"evt_address_button" => "An address between ! marks will become a button",
"evt_category" => "Categoría",
"evt_subcategory" => "Subcategory",
"evt_description" => "Descripción",
"evt_attachments" => "Attachments",
"evt_attach_file" => "Attach file",
"evt_click_to_open" => "Click to open",
"evt_click_to_remove" => "Click to remove",
"evt_no_pdf_img_vid" => "Attachment should be pdf, image or video",
"evt_error_file_upload" => "Error uploading file",
"evt_upload_too_large" => "Uploaded file too large",
"evt_date_time" => "Fecha / hora",
"evt_private" => "Evento Privado",
"evt_start_date" => "Inicio",
"evt_end_date" => "Final",
"evt_select_date" => "Seleccione fecha",
"evt_select_time" => "Seleccione hora",
"evt_all_day" => "Todo el día",
"evt_change" => "Cambiar",
"evt_set_repeat" => "Establecer repetición",
"evt_set" => "OK",
"evt_help" => "help",
"evt_repeat_not_supported" => "La repetición solicitada no está soportada",
"evt_no_repeat" => "No repetir",
"evt_repeat_on" => "Repetir el",
"evt_until" => "hasta",
"evt_blank_no_end" => "en blanco: sin final",
"evt_each_month" => "cada mes",
"evt_interval2_1" => "primer",
"evt_interval2_2" => "segudo",
"evt_interval2_3" => "tercer",
"evt_interval2_4" => "cuarto",
"evt_interval2_5" => "último",
"evt_period1_1" => "días",
"evt_period1_2" => "semanas",
"evt_period1_3" => "meses",
"evt_period1_4" => "años",
"evt_send_eml" => "Notificar",
"evt_send_sms" => "Send SMS",
"evt_now_and_or" => "ahora y/o",
"evt_event_added" => "Evento añadido",
"evt_event_edited" => "Evento modificado",
"evt_event_deleted" => "Evento eliminado",
"evt_event_approved" => "Evento aprobado",
"evt_days_before_event" => "días antes del evento",
"evt_to" => "A",
"evt_not_help" => "List of recipient addresses separated by semicolons. A recipient address can be a user name, an email address, a mobile phone number or, between square brackets, the name of a file with addresses in the \'reciplists\' directory, with one address (a user name, an email address or a mobile phone number) per line. When omitted, the default file extension is .txt.<br>Maximum field length: 255 characters.",
"evt_eml_help" => "Unless terminated with a $-sign, mobile phone numbers will be used to find the corresponding email address in the database. If not found, no email will be sent to this recipient.",
"evt_sms_help" => "Unless terminated with a $-sign, email addresses will be used to find the corresponding mobile phone number in the database. If not found, no SMS will be sent to this recipient.",
"evt_recip_list_too_long" => "Lista de destinatarios demasiado larga.",
"evt_no_recip_list" => "Lista de destinatarios está vacía",
"evt_not_in_past" => "Fecha de notificación pasada (anterior a hoy)",//
"evt_not_days_invalid" => "Fecha de notificación inválidas",//
"evt_status" => "Estado",
"evt_descr_help" => "The following items can be used in the description fields ...<br>• HTML tags &lt;b&gt;, &lt;i&gt;, &lt;u&gt; and &lt;s&gt; for bold, italic, underlined and striked-through text.",
"evt_descr_help_img" => "• small images (thumbnails) in the following format: \'image_name.ext\'. The thumbnail files, with file extension .gif, .jpg or .png, must be present in \'thumbnails\' folder. If enabled, the Thumbnails page can be used to upload thumbnail files.",
"evt_descr_help_eml" => "• Mailto-links in the following format: \'email address\' or \'email address [name]\', where \'name\' will be the title of the hyperlink. E.g. xxx@yyyy.zzz [For info click here].",
"evt_descr_help_url" => "• URL links in the following format: \'url\' or \'url [name]\', where \'name\' will be the title of the link. E.g. https://www.google.com [search].",
"evt_confirm_added" => "evento añadido",
"evt_confirm_saved" => "evento guardado",
"evt_confirm_deleted" => "evento eliminado",
"evt_add_close" => "Añadir y cerrar",
"evt_add" => "Añadir",
"evt_edit" => "Modificar",
"evt_save_close" => "Guardar y cerrar",
"evt_save" => "Guardar",
"evt_clone" => "Guardar como nuevo",
"evt_delete" => "Borrar",
"evt_close" => "Cerrar",
"evt_added" => "Añadido",
"evt_edited" => "Editado",
"evt_is_repeating" => "es un evento con repetición.",
"evt_is_multiday" => "es un evento multi-día.",
"evt_edit_series_or_occurrence" => "¿Quiere editar la serie completa o solo esta ocurrencia?",
"evt_edit_series" => "Editar la serie completa",
"evt_edit_occurrence" => "Edit solo esta ocurrencia",

//views
"vws_add_event" => "Añadir Evento",
"vws_edit_event" => "Edit Event",
"vws_see_event" => "See event details",
"vws_view_month" => "Ver mes",
"vws_view_week" => "Vista de la semana",
"vws_view_day" => "Ver día",
"vws_clic_for_full" => "para el calendario completo haga clic en mes",
"vws_view_full" => "Ver calendario completo",
"vws_prev_month" => "Mes anterior",
"vws_next_month" => "Mes siguiente",
"vws_today" => "Hoy",
"vws_back_to_today" => "Volver al mes de hoy",
"vws_back_to_main_cal" => "Back to the main calendar month",
"vws_week" => "Semana",
"vws_wk" => "sem",
"vws_time" => "Hora",
"vws_events" => "Eventos",
"vws_all_day" => "Todo el día",
"vws_earlier" => "Earlier",
"vws_later" => "Later",
"vws_venue" => "Ubicación del evento",
"vws_address" => "Address",
"vws_events_for_next" => "Eventos para los próximos",
"vws_days" => "día(s)",
"vws_added" => "Añadido",
"vws_edited" => "Editado",
"vws_notify" => "Notificar",
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
"chg_from_date" => "Fecha de inicio",
"chg_select_date" => "Seleccionar la fecha de inicio",
"chg_notify" => "Notificar",
"chg_days" => "Día(s)",
"chg_added" => "Añadido",
"chg_edited" => "Corregido",
"chg_deleted" => "Suprimido",
"chg_changed_on" => "Cambiado el",
"chg_changes" => "Cambios",
"chg_no_changes" => "Sin cambios.",

//search.php
"sch_define_search" => "Definir búsqueda",
"sch_search_text" => "Texto buscado",
"sch_event_fields" => "Campos del evento",
"sch_all_fields" => "Todos los campos",
"sch_title" => "Título",
"sch_description" => "Descripción",
"sch_venue" => "Ubicación",
"sch_user_group" => "User group",
"sch_event_cat" => "Categoría del evento",
"sch_all_groups" => "All Groups",
"sch_all_cats" => "Todas las categorías",
"sch_occurring_between" => "Ocurre entre",
"sch_select_start_date" => "Seleccionar fecha inicial",
"sch_select_end_date" => "Seleccionar fecha final",
"sch_search" => "Buscar",
"sch_invalid_search_text" => "El texto buscado está vacío o es demasiado corto",
"sch_bad_start_date" => "Fecha inicial erronea",
"sch_bad_end_date" => "Fecha final erronea",
"sch_no_results" => "No se han encontrado resultados",
"sch_new_search" => "Nueva búsqueda",
"sch_calendar" => "Ir al calendario",
"sch_extra_field1" => "Extra field 1",
"sch_extra_field2" => "Extra field 2",
"sch_sd_events" => "Single-day events",
"sch_md_events" => "Multi-day events",
"sch_rc_events" => "Recurring events",
"sch_instructions" =>
"<h3>Instrucciones de la búsqueda de texto</h3>
<p>Puede buscar eventos en la base de datos del calendario que contengan un texto específico.</p>
<br><p><b>Buscar texto</b>: Se buscará en los campos seleccionados (ver más adelante) de cada evento. 
La búsqueda no distingue entre mayúsculas y minúsculas.</p>
<p>Puede usar dos comodines:</p>
<ul>
<li>Los guiones bajos (_) en el texto buscado sustituyen a cualquier carácter individual.<br>
P.ej.: 'p_t_' encuentra 'pata', 'pita', y 'poto'.</li>
<li>El signo &amp; en el texto buscado sustituyen a cualquier combinación de carácteres.<br>
P.ej.: 'so&amp;o' encuentra 'solp', 'sombrero', y 'sonajero'.</li>
</ul>
<br><p><b>Campos del evento</b>: Solo se buscará en los campos seleccionados.</p>
<br><p><b>User group</b>: Events in the selected user group will be searched only.</p>
<br><p><b>Categoría del evento</b>: Solo se buscarán eventos de las categorías seleccionadas.</p>
<br><p><b>Ocurre entre</b>: Las fechas de inicio y final son opcionales. 
Una fecha inicial vacía significa buscar eventos con hasta un año de antigüedad.
Una fecha final vacía significa buscar eventos que ocurren hasta dentro de año.</p>
<br><p>To avoid repetitions of the same event, the search results will be split 
in single-day events, multi-day events and recurring events.</p>
<p>Los resultados se mostrarán en orden cronológico.</p>",

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
