<?php

namespace Database\Factories;

use App\Models\Ecole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Support\Carbon;

class EcoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ecole::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => 'مدرسة النجاح',
            'genre' => 'مدرسة إبتدائية',
            'ecole_photo_path' => '1629626657.jpg',
            'adresse' => 'Rte de l\'aéroport, Tunis',
            'email' => 'email@ecole-najah.tn',
            'phone' => '11223344',
            'description1' => 'نحن نركز على تعليم طلابنا أساسيات أحدث وأكبر التقنيات لإعدادهم لدورهم التنموي الأول',
            'description2' => 'هذا الموقع خاص بالمدرسة و ذلك لتسهيل عمل كافة الإطارات بالمدرسة و كما أنه يسهل التواصل بين المعلم و التلميذ

            :كما أن هذا الموقع يتولى عديد الوضائف منها

            1) التصرف في المدرسين

            2) التصرف في الأقسام

            3) التصرف في المواد

            4) التصرف في جدول الأوقات

            5) تعيين المدرسين',
        ];
    }
}
