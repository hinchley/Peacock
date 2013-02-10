<?php
// php syntax highlighting rules

return [
  'quotes' =>
    '/
      (?<!\\\\)  # if not preceeded by a backslash
      [\'"`]     # match opening single or double quote or backtick
      .*?        # then everything upto
      (?<!\\\\)  # if not preceeded by a backslash
      [\'"`]     # match first closing single or double quote or backtick
    /sx',
  'comments' =>
    '/
      \-\-     # match opening comment
      [^\n]*$  # then everything upto the end of the line
      |        # or
      \/\*     # match opening comment
      .*?      # then everything upto
      \*\/     # the first closing comment
    /smx',
  'variables' =>
    '/
      (?<!\w|\@)  # if not preceeded by a word char or at symbol
      @           # match at symbol
      \w+         # one or more word chars
    /x',
  'datatypes' =>
    '/
      (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
      (           # match any one of the following words
      bigint|binary|bit|char|cursor|date|datetime|datetime2|datetimeoffset|
      decimal|float|hierarchyid|image|int|money|nchar|ntext|numeric|
      nvarchar|real|smalldatetime|smallint|smallmoney|sql_variant|table|
      text|time|timestamp|tinyint|uniqueidentifier|varbinary|varchar|xml
      )
      (?!\w)      # if not followed by a word char
    /xi',
  'operators' =>
    '/
      (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
      (           # match any one of the following words
      all|and|any|between|exists|in|like|not|or|some
      )
      (?!\w)      # if not followed by a word char
    /xi',
  'keywords' =>
    '/
      (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
      (           # match any one of the following words
      add|all|alter|and|any|as|asc|authorization|backup|begin|between|break|
      browse|bulk|by|cascade|case|check|checkpoint|close|clustered|coalesce|
      collate|column|commit|compute|constraint|contains|containstable|
      continue|convert|create|cross|current|current_date|current_time|
      current_timestamp|current_user|cursor|database|dbcc|deallocate|
      declare|default|delete|deny|desc|disk|distinct|distributed|double|
      drop|dump|else|end|errlvl|escape|except|exec|execute|exists|exit|
      external|fetch|file|fillfactor|for|foreign|freetext|freetexttable|
      from|full|function|goto|grant|group|having|holdlock|identity|
      identity_insert|identitycol|if|in|index|inner|insert|intersect|into|
      is|join|key|kill|left|like|lineno|load|merge|national|nocheck|
      nonclustered|not|null|nullif|of|off|offsets|on|open|opendatasource|
      openquery|openrowset|openxml|option|or|order|outer|over|percent|pivot|
      plan|precision|primary|print|proc|procedure|public|raiserror|read|
      readtext|reconfigure|references|replication|restore|restrict|return|
      revert|revoke|right|rollback|rowcount|rowguidcol|rule|save|schema|
      securityaudit|select|semantickeyphrasetable|
      semanticsimilaritydetailstable|semanticsimilaritytable|session_user|
      set|setuser|shutdown|some|statistics|system_user|table|tablesample|
      textsize|then|to|top|tran|transaction|trigger|truncate|try_convert|
      tsequal|union|unique|unpivot|update|updatetext|use|user|values|
      varying|view|waitfor|when|where|while|with|within group|writetext
      )
      (?!\w)      # if not followed by a word char
    /xi',
  'functions' =>
    '/
      (?<!\w|\$)  # if not preceeded by a word char or dollar symbol
      (           # match any one of the following words
      acos|app_name|applock_mode|applock_test|ascii|asin|assemblyproperty|
      atan|atn2|avg|binary_checksum|cast|ceiling|certencoded|certprivatekey|
      char|charindex|checksum|checksum_agg|choose|col_length|col_name|
      columnproperty|concat|connectionproperty|context_info|convert|cos|cot|
      count|count_big|current_request_id|current_timestamp|current_user|
      database_principal_id|database_principal_id|databasepropertyex|
      dateadd|datediff|datefromparts|datename|datepart|datetime2fromparts|
      datetimefromparts|datetimeoffsetfromparts|day|db_id|db_name|degrees|
      dense_rank|difference|eomonth|error_line|error_message|error_number|
      error_procedure|error_severity|error_state|exp|file_id|file_idex|
      file_name|filegroup_id|filegroup_name|filegroupproperty|fileproperty|
      floor|format|formatmessage|fulltextcatalogproperty|
      fulltextserviceproperty|get_filestream_transaction_context|
      getansinull|getdate|getutcdate|grouping|grouping_id|has_perms_by_name|
      host_id|host_name|iif|index_col|indexkey_property|indexproperty|
      is_member|is_rolemember|is_srvrolemember|isdate|isnull|isnumeric|left|
      len|log|log10|lower|ltrim|max|min|min_active_rowversion|month|nchar|
      newid|newsequentialid|next value for|ntile|object_definition|
      object_id|object_name|object_schema_name|objectproperty|
      objectpropertyex|opendatasource|openquery|openrowset|openxml|
      original_db_name|original_login|parse|parsename|partition|patindex|
      patindex|permissions|pi|power|pwdcompare|pwdencrypt|quotename|radians|
      rand|rank|replace|replicate|reverse|right|round|row_number|
      rowcount_big|rtrim|schema_id|schema_id|schema_name|schema_name|
      scope_identity|serverproperty|session_user|sign|sin|
      smalldatetimefromparts|soundex|space|sqrt|square|stats_date|stdev|
      stdevp|str|stuff|substring|sum|suser_id|suser_name|suser_sid|
      suser_sname|switchoffset|sys.fn_builtin_permissions|sysdatetime|
      sysdatetimeoffset|system_user|sysutcdatetime|tan|textptr|textvalid|
      timefromparts|todatetimeoffset|try_cast|try_convert|try_parse|type_id|
      type_name|typeproperty|unicode|upper|user_id|user_name|var|varp|
      xact_state|year
      )
      (?!\w)      # if not followed by a word char
    /xi',
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
