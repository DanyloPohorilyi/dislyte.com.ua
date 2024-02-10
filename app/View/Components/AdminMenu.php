<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminMenu extends Component
{
    protected $menuItems;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $activeLink
    ) {
    }
    public function getMenuItems()
    {
        $menuItems = [
            [
                'label' => 'Home',
                'parent' => null,
                'url' => '/admin/',
                'special' => false
            ],
            [
                'label' => 'Espers',
                'parent' => null,
                'url' => '#',
                'special' => false
            ],
            [

                'label' => 'Espers',
                'parent' => 'Espers',
                'url' => '/admin/espers/espers',
                'special' => false
            ],
            [
                'label' => 'Elements',
                'parent' => 'Espers',
                'url' => '/admin/espers/elements',
                'special' => false
            ],
            [
                'label' => 'Equipment',
                'parent' => 'Espers',
                'url' => '/admin/espers/Equipment',
                'special' => false
            ],
            [
                'label' => 'Equipment',
                'parent' => 'Espers',
                'url' => '/admin/espers/Equipment',
                'special' => false
            ],
            [
                'label' => 'Users',
                'parent' => null,
                'url' => '/admin/users/',
                'special' => false
            ],
            [
                'label' => 'Admins',
                'parent' => null,
                'url' => '/admin/admins',
                'special' => false
            ]
        ];

        return $menuItems;
    }

    public function changeSpecial()
    {
        foreach ($this->menuItems as &$item) {
            if ($item['label'] === $this->activeLink) {
                $item['special'] = true;
            }
        }
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-menu');
    }
}
