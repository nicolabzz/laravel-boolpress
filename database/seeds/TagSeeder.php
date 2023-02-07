<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'php', 'Node', 'C#', 'Javascript', 'Laravel', 'Express', 'Vue', 'React', 'Angular', 'Alpine', 'MySql', 'MongoDB'
        ];

        foreach ($tags as $tag) {
            // Metodo 1
            // $objTag = new Tag;
            // $objTag->name = $tag['name'];
            // $objTag->save();

            // Metodo 2
            // $objTag = new Tag;
            // $objTag->fill($tag);
            // $objTag->save();

            // Metodo 3
            Tag::create([
                'name'  => $tag,
            ]);
        }
    }
}
