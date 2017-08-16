<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BranchesTableSeeder::class);
        // $this->call(BranchProductTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        // $this->call(ClientsTableSeeder::class);
        // $this->call(EmployeesTableSeeder::class);
        // $this->call(PositionsTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(PurchaseDetailsTableSeeder::class);
        // $this->call(PurchasesTableSeeder::class);
        // $this->call(QuotationsTableSeeder::class);
        // $this->call(SaleDetailsTableSeeder::class);
        // $this->call(SalesTableSeeder::class);
        $this->call(StatusesTableSeeder::class);
    }
}
