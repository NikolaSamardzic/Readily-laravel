<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\LinkPosition;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LinkTargetsTableSeeder::class);
        $this->call(LinkTypesTableSeeder::class);
        $this->call(LinkPositionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PublishersTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(DeliveryTypeSeeder::class);
        $this->call(SortTableSeeder::class);

        $this->call(UserTableSeeder::class);
        $this->call(AvatarTableSeeder::class);
        $this->call(BiographiesTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BookCategoryTableSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(BookOrderSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(CommentImageSeeder::class);

        $this->call(LinksTableSeeder::class);
        $this->call(LinkLinkPositionSeeder::class);
        $this->call(LinkRoleSeeder::class);
    }
}
