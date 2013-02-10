<?php
return [
'squotes' =>
  '/
    (?<!\\\\)  # if not preceeded by a backslash
    \'         # match opening single quote
    .*?        # then everything upto
    (?<!\\\\)  # if not preceeded by a backslash
    \'         # the first closing single quote
  /sx',
'variables' =>
  '/
    (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
    \$          # match dollar symbol
    \w+         # one or more word chars
  /x',
'dquotes' =>
  '/
    (?<!\\\\)  # if not preceeded by a backslash
    "          # match opening double quote
    .*?        # then everything upto
    (?<!\\\\)  # if not preceeded by a backslash
    "          # the first closing double quote
  /sx',
'comments' =>
  '/
    \/\/     # match opening comment
    [^\n]*$  # then everything upto the end of the line
    |        # or
    \/\*     # match opening comment
    .*?      # then everything upto
    \*\/     # the first closing comment
  /smx',
'keywords' =>
  '/
    (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
    (           # match any one of the following words
    abstract|and|array|as|break|case|catch|cfunction|class|
    clone|const|continue|declare|default|die|do|echo|else|elseif|empty|
    enddeclare|endfor|endforeach|endif|endswitch|endwhile|exit|eval|
    extends|final|for|foreach|function|include|include_once|global|goto|
    if|implements|interface|instanceof|isset|list|namespace|new|
    old_function|or|print|private|protected|public|return|require|
    require_once|static|switch|throw|try|unset|use|var|while|xor
    )
    (?!\w)      # if not followed by a word char
  /x',
'functions' =>
  '/
    (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
    (           # match any one of the following words
    abs|acos|acosh|addcslashes|addslashes|array|
    array_change_key_case|array_chunk|array_combine|array_count_values|
    array_diff|array_diff_assoc|array_diff_key|array_diff_uassoc|
    array_diff_ukey|array_fill|array_fill_keys|array_filter|array_flip|
    array_intersect|array_intersect_assoc|array_intersect_key|
    array_intersect_uassoc|array_intersect_ukey|array_keys|
    array_key_exists|array_map|array_merge|array_merge_recursive|
    array_multisort|array_pad|array_pop|array_product|array_push|
    array_rand|array_reduce|array_replace|array_replace_recursive|
    array_reverse|array_search|array_shift|array_slice|array_splice|
    array_sum|array_udiff|array_udiff_assoc|array_udiff_uassoc|
    array_uintersect|array_uintersect_assoc|array_uintersect_uassoc|
    array_unique|array_unshift|array_values|array_walk|
    array_walk_recursive|arsort|asin|asinh|asort|assert|assert_options|
    atan|atan2|atanh|base64_decode|base64_encode|basename|base_convert|
    bin2hex|bindec|call_user_func|call_user_func_array|call_user_method|
    call_user_method_array|ceil|chdir|checkdate|checkdnsrr|chgrp|chmod|
    chop|chown|chr|chroot|chunk_split|class_alias|class_exists|
    clearstatcache|closedir|closelog|compact|connection_aborted|
    connection_status|connection_timeout|constant|convert_cyr_string|
    convert_uudecode|convert_uuencode|copy|cos|cosh|count|count_chars|
    crc32|create_function|crypt|current|date|date_add|date_create|
    date_create_from_format|date_date_set|date_default_timezone_get|
    date_default_timezone_set|date_diff|date_format|date_get_last_errors|
    date_interval_create_from_date_string|date_interval_format|
    date_isodate_set|date_modify|date_offset_get|date_parse|
    date_parse_from_format|date_sub|date_sunrise|date_sunset|
    date_sun_info|date_timestamp_get|date_timestamp_set|date_timezone_get|
    date_timezone_set|date_time_set|debug_backtrace|debug_print_backtrace|
    debug_zval_dump|decbin|dechex|decoct|define|defined|
    define_syslog_variables|deg2rad|delete|die|dir|dirname|diskfreespace|
    disk_free_space|disk_total_space|dl|dns_check_record|dns_get_mx|
    dns_get_record|doubleval|each|echo|empty|end|ereg|eregi|eregi_replace|
    ereg_replace|error_get_last|error_log|error_reporting|escapeshellarg|
    escapeshellcmd|eval|exec|exit|exp|explode|expm1|extension_loaded|
    extract|ezmlm_hash|fclose|feof|fflush|fgetc|fgetcsv|fgets|fgetss|file|
    fileatime|filectime|filegroup|fileinode|filemtime|fileowner|fileperms|
    filesize|filetype|file_exists|file_get_contents|file_put_contents|
    filter_has_var|filter_id|filter_input|filter_input_array|filter_list|
    filter_var|filter_var_array|floatval|flock|floor|flush|fmod|fnmatch|
    fopen|forward_static_call|forward_static_call_array|fpassthru|fprintf|
    fputcsv|fputs|fread|fscanf|fseek|fsockopen|fstat|ftell|ftruncate|
    function_exists|func_get_arg|func_get_args|func_num_args|fwrite|
    gc_collect_cycles|gc_disable|gc_enable|gc_enabled|getcwd|getdate|
    getenv|gethostbyaddr|gethostbyname|gethostbynamel|gethostname|
    getlastmod|getmxrr|getmygid|getmyinode|getmypid|getmyuid|getopt|
    getprotobyname|getprotobynumber|getrandmax|getrusage|getservbyname|
    getservbyport|gettimeofday|gettype|get_browser|get_called_class|
    get_cfg_var|get_class|get_class_methods|get_class_vars|
    get_current_user|get_declared_classes|get_declared_interfaces|
    get_defined_constants|get_defined_functions|get_defined_vars|
    get_extension_funcs|get_headers|get_html_translation_table|
    get_included_files|get_include_path|get_loaded_extensions|
    get_magic_quotes_gpc|get_magic_quotes_runtime|get_meta_tags|
    get_object_vars|get_parent_class|get_required_files|get_resource_type|
    glob|gmdate|gmmktime|gmstrftime|header|headers_list|headers_sent|
    header_register_callback|header_remove|hebrev|hebrevc|hex2bin|hexdec|
    highlight_file|highlight_string|htmlentities|htmlspecialchars|
    htmlspecialchars_decode|html_entity_decode|http_build_query|
    http_response_code|hypot|idate|ignore_user_abort|implode|
    import_request_variables|inet_ntop|inet_pton|ini_alter|ini_get|
    ini_get_all|ini_restore|ini_set|interface_exists|intval|in_array|
    ip2long|isset|is_a|is_array|is_bool|is_callable|is_dir|is_double|
    is_executable|is_file|is_finite|is_float|is_infinite|is_int|
    is_integer|is_link|is_long|is_nan|is_null|is_numeric|is_object|
    is_readable|is_real|is_resource|is_scalar|is_string|is_subclass_of|
    is_uploaded_file|is_writable|is_writeable|join|key|krsort|ksort|
    lcfirst|lcg_value|lchgrp|lchown|levenshtein|link|linkinfo|list|
    localeconv|localtime|log|log10|log1p|long2ip|lstat|ltrim|
    magic_quotes_runtime|mail|main|max|md5|md5_file|memory_get_peak_usage|
    memory_get_usage|metaphone|method_exists|microtime|min|mkdir|mktime|
    money_format|move_uploaded_file|mt_getrandmax|mt_rand|mt_srand|
    natcasesort|natsort|next|nl2br|nl_langinfo|number_format|ob_clean
    ob_end_clean|ob_end_flush|ob_flush|ob_get_clean|ob_get_contents|
    ob_get_flush|ob_get_length|ob_get_level|ob_get_status|ob_gzhandler|
    ob_implicit_flush|ob_list_handlers|ob_start|octdec|opendir|openlog|
    ord|output_add_rewrite_var|output_reset_rewrite_vars|pack|
    parse_ini_file|parse_ini_string|parse_str|parse_url|passthru|pathinfo|
    pclose|pfsockopen|phpcredits|phpinfo|phpversion|php_check_syntax|
    php_ini_loaded_file|php_ini_scanned_files|php_logo_guid|php_sapi_name|
    php_strip_whitespace|php_uname|pi|popen|pos|pow|prev|print|printf|
    print_r|proc_close|proc_get_status|proc_nice|proc_open|proc_terminate|
    property_exists|putenv|quoted_printable_decode|
    quoted_printable_encode|quotemeta|rad2deg|rand|range|rawurldecode|
    rawurlencode|readdir|readfile|readlink|realpath|realpath_cache_get|
    realpath_cache_size|register_shutdown_function|register_tick_function|
    rename|reset|restore_error_handler|restore_exception_handler|
    restore_include_path|rewind|rewinddir|rmdir|round|rsort|rtrim|scandir|
    serialize|session_cache_expire|session_cache_limiter|session_commit|
    session_decode|session_destroy|session_encode|
    session_get_cookie_params|session_id|session_is_registered|
    session_module_name|session_name|session_regenerate_id|
    session_register|session_save_path|session_set_cookie_params|
    session_set_save_handler|session_start|session_unregister|
    session_unset|session_write_close|setcookie|setlocale|setrawcookie|
    settype|set_error_handler|set_exception_handler|set_file_buffer|
    set_include_path|set_magic_quotes_runtime|set_time_limit|sha1|
    sha1_file|shell_exec|show_source|shuffle|similar_text|sin|sinh|sizeof|
    sleep|socket_get_status|socket_set_blocking|socket_set_timeout|sort|
    soundex|split|spliti|sprintf|sql_regcase|sqrt|srand|sscanf|stat|
    strcasecmp|strchr|strcmp|strcoll|strcspn|strftime|stripcslashes|
    stripos|stripslashes|strip_tags|stristr|strlen|strnatcasecmp|
    strnatcmp|strncasecmp|strncmp|strpbrk|strpos|strptime|strrchr|strrev|
    strripos|strrpos|strspn|strstr|strtok|strtolower|strtotime|strtoupper|
    strtr|strval|str_getcsv|str_ireplace|str_pad|str_repeat|str_replace|
    str_rot13|str_shuffle|str_split|str_word_count|substr|substr_compare|
    substr_count|substr_replace|symlink|syslog|system|sys_getloadavg|
    sys_get_temp_dir|tan|tanh|tempnam|time|timezone_abbreviations_list|
    timezone_identifiers_list|timezone_location_get|
    timezone_name_from_abbr|timezone_name_get|timezone_offset_get|
    timezone_open|timezone_transitions_get|timezone_version_get|
    time_nanosleep|time_sleep_until|tmpfile|token_get_all|token_name|
    touch|trigger_error|trim|uasort|ucfirst|ucwords|uksort|umask|uniqid|
    unlink|unpack|unregister_tick_function|unserialize|unset|urldecode|
    urlencode|user_error|usleep|usort|var_dump|var_export|version_compare|
    vfprintf|vprintf|vsprintf|wordwrap|zend_logo_guid|zend_thread_id|
    zend_version|__halt_compiler
    )
    (?!\w)      # if not followed by a word char
  /x',
'constants' =>
  '/
    (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
    [A-Z_]+     # match at least one uppercase letter or underscore
    [A-Z0-9_]*  # match any uppercase letters, numbers or underscores
    (?!\w)      # if not followed by a word char
  /x',
'numbers' =>
  '/
    (?<!\w|\xB7)  # if not preceeded by a word char or middle dot
    (
      0x[\da-f]+  # match any hexadecimal number
      |\d+        # or decimal number
    )
    (?!\w)        # if not followed by a word char
  /ix'
];