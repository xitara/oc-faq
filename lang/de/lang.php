<?php return [
    'plugin' => [
        'name' => 'PaidMedia FAQs',
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
        'reorder_title' => 'Reihenfolge ändern',
    ],
    'groups' => [
        'placeholder' => 'Gruppe auswählen',
        'all' => 'alle',
        'label' => 'Gruppe',
    ],
    'description' => [
        'group' => 'Gruppe der FAQs die angezeigt werden soll.',
    ],
];
