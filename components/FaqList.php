<?php namespace Xitara\Faq\Components;

use Cms\Classes\ComponentBase;
use Lang;
use Xitara\Faq\Models\Faq;
use Xitara\Faq\Models\Groups;

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
                'title' => 'xitara.faq::lang.faq.group',
                'description' => 'xitara.faq::lang.description.group',
                'type' => 'dropdown',
                'placeholder' => 'xitara.faq::lang.groups.placeholder',
            ],
        ];
    }

    public function getGroupOptions()
    {
        $groups = Groups::select('id', 'name')->orderBy('name')->get();

        $groupList = [
            'all' => Lang::get('xitara.faq::lang.groups.all'),
        ];

        foreach ($groups as $group) {
            $groupList[$group->attributes['id']] = $group->attributes['name'];
        }

        return $groupList;
    }

    public function onRender()
    {
        $query = Faq::where('active', 1)
            ->orderBy('sort_order');

        if ($this->property('group') == 'all') {
            $groups = Groups::where('is_all', 1)->lists('name', 'id');
            $query->whereRaw('(`group_id`=' . join(' OR `group_id`=', array_keys($groups)) . ')');
        } else {
            $query->where('group_id', '=', $this->property('group'));
        }

        $this->page['faqList'] = $query->get();
    }
}
