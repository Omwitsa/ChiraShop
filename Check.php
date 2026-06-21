php artisan serve --host=0.0.0.0 --port=9093

Users -> personnel, active

https://github.com/yoeunes/toastr


php artisan make:model Prifile -m


ALTER TABLE price_lines ADD client_category VARCHAR(50);
ALTER TABLE orderline ADD discount decimal(11,2);
ALTER TABLE orderline ADD tax decimal(11,2);
ALTER TABLE orderline RENAME COLUMN price TO unit_price;
