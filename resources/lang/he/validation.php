<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute חייב להיות מסומן.',
    'active_url' => ':attribute אינו כתובת אינטרנט תקינה.',
    'after' => ':attribute חייב להיות תאריך אחרי :date.',
    'after_or_equal' => ':attribute חייב להיות תאריך אחרי או שווה ל-:date.',
    'alpha' => ':attribute יכול להכיל אותיות בלבד.',
    'alpha_dash' => ':attribute יכול להכיל אותיות, מספרים, קו תחתון ומקף בלבד.',
    'alpha_num' => ':attribute יכול להכיל אותיות ומספרים בלבד.',
    'array' => ':attribute חייב להיות מערך.',
    'before' => ':attribute חייב להיות תאריך לפני :date.',
    'before_or_equal' => ':attribute חייב להיות תאריך לפני או שווה ל-:date.',
    'between' => [
        'numeric' => ':attribute חייב להיות בין :min ל-:max.',
        'file' => ':attribute חייב להיות בין :min ל-:max קילובייטים.',
        'string' => ':attribute חייב להיות בין :min ל-:max תווים.',
        'array' => ':attribute חייב להיות בין :min ל-:max פריטים.',
    ],
    'boolean' => ':attribute חייב להיות אמת או שקר.',
    'confirmed' => ':attribute אינו תואם את האישור.',
    'date' => ':attribute אינו תאריך תקין.',
    'date_equals' => ':attribute חייב להיות תאריך שווה ל-:date.',
    'date_format' => ':attribute אינו תואם את הפורמט :format.',
    'different' => ':attribute ו-:other חייבים להיות שונים.',
    'digits' => ':attribute חייב להיות :digits ספרות.',
    'digits_between' => ':attribute חייב להיות בין :min ל-:max ספרות.',
    'dimensions' => ':attribute חייב להיות במידות תקינות.',
    'distinct' => ':attribute כבר קיים.',
    'email' => ':attribute חייב להיות כתובת אימייל תקינה.',
    'ends_with' => ':attribute חייב להסתיים באחד מהבאים: :values',
    'exists' => ':attribute אינו תקין.',
    'file' => ':attribute חייב להיות קובץ.',
    'filled' => ':attribute הוא שדה חובה.',
    'gt' => [
        'numeric' => ':attribute חייב להיות גדול מ-:value.',
        'file' => ':attribute חייב להיות גדול מ-:value קילובייטים.',
        'string' => ':attribute חייב להיות גדול מ-:value תווים.',
        'array' => ':attribute חייב להיות גדול מ-:value פריטים.',
    ],
    'gte' => [
        'numeric' => ':attribute חייב להיות גדול או שווה ל-:value.',
        'file' => ':attribute חייב להיות גדול או שווה ל-:value קילובייטים.',
        'string' => ':attribute חייב להיות גדול או שווה ל-:value תווים.',
        'array' => ':attribute חייב להיות גדול או שווה ל-:value פריטים.',
    ],
    'image' => ':attribute חייב להיות תמונה.',
    'in' => ':attribute אינו תקין.',
    'in_array' => ':attribute אינו קיים ב-:other.',
    'integer' => ':attribute חייב להיות מספר שלם.',
    'ip' => ':attribute חייב להיות כתובת IP תקינה.',
    'ipv4' => ':attribute חייב להיות כתובת IPv4 תקינה.',
    'ipv6' => ':attribute חייב להיות כתובת IPv6 תקינה.',
    'json' => ':attribute חייב להיות מחרוזת JSON תקינה.',
    'lt' => [
        'numeric' => ':attribute חייב להיות קטן מ-:value.',
        'file' => ':attribute חייב להיות קטן מ-:value קילובייטים.',
        'string' => ':attribute חייב להיות קטן מ-:value תווים.',
        'array' => ':attribute חייב להיות קטן מ-:value פריטים.',
    ],
    'lte' => [
        'numeric' => ':attribute חייב להיות קטן או שווה ל-:value.',
        'file' => ':attribute חייב להיות קטן או שווה ל-:value קילובייטים.',
        'string' => ':attribute חייב להיות קטן או שווה ל-:value תווים.',
        'array' => ':attribute חייב להיות קטן או שווה ל-:value פריטים.',
    ],
    'max' => [
        'numeric' => ':attribute חייב להיות לא יותר מ-:max.',
        'file' => ':attribute חייב להיות לא יותר מ-:max קילובייטים.',
        'string' => ':attribute חייב להיות לא יותר מ-:max תווים.',
        'array' => ':attribute חייב להיות לא יותר מ-:max פריטים.',
    ],
    'mimes' => ':attribute חייב להיות קובץ מסוג: :values.',
    'mimetypes' => ':attribute חייב להיות קובץ מסוג: :values.',
    'min' => [
        'numeric' => ':attribute חייב להיות לפחות :min.',
        'file' => ':attribute חייב להיות לפחות :min קילובייטים.',
        'string' => ':attribute חייב להיות לפחות :min תווים.',
        'array' => ':attribute חייב להיות לפחות :min פריטים.',
    ],
    'not_in' => ':attribute אינו תקין.',
    'not_regex' => ':attribute אינו תקין.',
    'numeric' => ':attribute חייב להיות מספר.',
    'password' => 'הסיסמה שגויה.',
    'present' => ':attribute חייב להיות קיים.',
    'regex' => ':attribute אינו תקין.',
    'required' => ':attribute הוא שדה חובה.',
    'required_if' => ':attribute הוא שדה חובה כאשר :other הוא :value.',
    'required_unless' => ':attribute הוא שדה חובה אלא אם :other הוא :values.',
    'required_with' => ':attribute הוא שדה חובה כאשר :values קיים.',
    'required_with_all' => ':attribute הוא שדה חובה כאשר :values קיים.',
    'required_without' => ':attribute הוא שדה חובה כאשר :values אינו קיים.',
    'required_without_all' => ':attribute הוא שדה חובה כאשר אף אחד מ-:values אינו קיים.',
    'same' => ':attribute ו-:other חייבים להיות זהים.',
    'size' => [
        'numeric' => ':attribute חייב להיות :size.',
        'file' => ':attribute חייב להיות :size קילובייטים.',
        'string' => ':attribute חייב להיות :size תווים.',
        'array' => ':attribute חייב להיות :size פריטים.',
    ],
    'starts_with' => ':attribute חייב להתחיל באחד מהבאים: :values',
    'string' => ':attribute חייב להיות מחרוזת.',
    'timezone' => ':attribute חייב להיות אזור תקין.',
    'unique' => ':attribute כבר קיים.',
    'uploaded' => ':attribute נכשל בהעלאה.',
    'url' => ':attribute אינו תקין.',
    'uuid' => ':attribute חייב להיות UUID תקין.',
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'הודעת המותאם אישית',
        ],
    ],
    'attributes' => [
        'address' => 'כתובת',
        'age' => 'גיל',
        'available' => 'זמין',
        'city' => 'עיר',
        'content' => 'תוכן',
        'country' => 'מדינה',
        'date' => 'תאריך',
        'day' => 'יום',
        'description' => 'תיאור',
        'email' => 'אימייל',
        'excerpt' => 'קטע',
        'permissions' => 'הרשאות',
        'phone' => 'טלפון',
        'image' => '',
        'message' =>'הודעה',
        'mobile' => 'טלפון נייד',
        'month' => 'חודש',
        'name' => 'שם',
        'password' => 'סיסמה',
        'password_confirmation' => 'אימות סיסמה',
        'price' => 'מחיר',
        'role' => '',
        'subject' => 'נושא',
        'time' => 'שעה',
        'title' => 'כותרת',
        'username' => 'שם משתמש',
        'year' => 'שנה',
        'zip' => 'מיקוד',
        'status' => 'סטטוס',
        'type' => 'סוג',
        'category' => 'קטגוריה',
        'categories' => 'קטגוריות',
        'tag' => 'תג',
        'tags' => 'תגיות',
        'slug' => 'סלאג',
        'meta_title' => 'כותרת מטא',
        'meta_description' => 'תיאור מטא',
        'meta_keywords' => 'מילות מפתח מטא',
        'user' => 'משתמש',
        'users' => 'משתמשים',
        'category_id' => 'קטגוריה',
        'ar'=>[
            'name' => 'שם ערבי
',
            'description' => 'תיאור ערבי',
            'title' => 'כותרת ערבית',
            'short_name'=>'שם קצר בערבית'
        ],
        'en'=>[
            'name' => 'שם אנגלי
',
            'description' => 'תיאור באנגלית',
            'title' => 'כותרת באנגלית',
            'short_name'=>'שם קצר באנגלית'
        ],
        'he'=>[
            'name' => 'שם עברי
',
            'description' => 'תיאור בעברית
',
            'title' => 'כותרת בעברית
',
            'short_name'=>'שם קצר בעברית
',
        ],
    ],


];
