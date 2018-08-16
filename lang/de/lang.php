<?php return [
    'plugin' => [
        'name' => 'PM FAQs',
        'description' => 'FAQ-Liste mit Gruppierungsmöglichkeit',
    ],
    'submenu' => [
        'name' => 'FAQ-Verwaltung',
        'faqs' => 'FAQs',
        'groups' => 'Gruppenverwaltung',
    ],
    'faq' => [
        'id' => 'ID',
        'name' => 'Name',
        'description' => 'Beschreibung',
        'question' => 'Frage',
        'answer' => 'Antwort',
        'group' => 'Gruppe',
        'active' => 'Aktiv',
        'created_at' => 'angelegt',
        'updated_at' => 'letztes Update',
    ],
    'groups' => [
        'placeholder' => 'Gruppe auswählen',
        'all' => 'alle',
    ],
    'description' => [
        'group' => 'Gruppe der FAQs die angezeigt werden soll.',
    ],
];
