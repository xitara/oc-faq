<?php namespace Xitara\PMFaq\Components;

use Cms\Classes\ComponentBase;
use Lang;
use Xitara\PMFaq\Models\Faq;
use Xitara\PMFaq\Models\Groups;

class FaqList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'FAQ-Liste',
            'description' => 'Ausgabe der FAQs nach Gruppe.',
        ];
    }

    public function defineProperties()
    {
        return [
            'group' => [
                'title' => 'xitara.pmfaq::lang.faq.group',
                'description' => 'xitara.pmfaq::lang.description.group',
                'type' => 'dropdown',
                'placeholder' => 'xitara.pmfaq::lang.groups.placeholder',
            ],
        ];
    }

    public function getGroupOptions()
    {
        $groups = Groups::select('id', 'name')->orderBy('name')->get();

        $groupList = [
            'all' => Lang::get('xitara.pmfaq::lang.groups.all'),
        ];

        foreach ($groups as $group) {
            $groupList[$group->attributes['id']] = $group->attributes['name'];
        }

        return $groupList;
    }

    public function onRender()
    {
        // var_dump($this->alias);

        $query = Faq::select('id', 'question', 'answer')
            ->where('active', 1)
            ->orderBy('sort_order');

        if ($this->property('group') != 'all') {
            $query->where('group_id', '=', $this->property('group'));
        }

        foreach ($query->get() as $item) {
            $faq[$item->id] = [
                'question' => $item->question,
                'answer' => $item->answer,
            ];
        }

        // var_dump($faq);

        $this->page['faqList'] = $faq;
    }
}
