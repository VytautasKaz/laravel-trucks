<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class TruckForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('truckmaker_id', 'select', [
                'label' => 'Truck',
                'choices' => ['4' => 'GAZ', '3' => 'Mercedes', '2' => 'VAZ', '1' => 'Volvo'],
                'empty_value' => 'Select a truck maker',
                'rules' => 'required',
            ])
            ->add('year', 'number', [
                'rules' => 'required'
            ])
            ->add('name', 'text', [
                'rules' => 'required',
                'label' => 'Full Owner Name'
            ])
            ->add('owners_count', 'number', [
                'label' => 'Number Of Owners'
            ])
            ->add('comments', 'textarea')
            ->add('submit', 'submit');
    }
}
