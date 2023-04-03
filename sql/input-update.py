import pymysql
import datetime
from random import *

conn = pymysql.connect(host= "localhost",
                       user="root",
                       passwd="root",
                       db="SHU_DATA",
                       charset='utf8')

x = conn.cursor()


def main(): 
    canteen_name, canteen_id = location()
    
    employee_name, employee_id = employee()

    print(canteen_name, canteen_id, employee_name, employee_id)

    products = scan()


    date_time = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    customer_id = randint(1, 10)
    print(products, date_time)

    
    total_price = 0
    for product_id, amount in products.items():
        for i in range(amount):
            x.execute("SELECT products.price FROM stocks INNER JOIN products ON stocks.product_id=products.id WHERE product_id = %s", (product_id))
            price = x.fetchone()[0]
            total_price += price * amount
            print(total_price)

            x.execute("SELECT id FROM stocks WHERE canteen_id = %s AND product_id = %s", (canteen_id, product_id))
            stock_id = x.fetchone()
            print(stock_id)

            x.execute("UPDATE stocks SET amount = amount -1 WHERE canteen_id = %s AND product_id = %s", (canteen_id, product_id))


            

    x.execute("INSERT INTO transactions(dos, customer_id, employee_id, total_price) VALUES (%s, %s, %s, %s)", (date_time, customer_id, employee_id, total_price))
    trans_id = x.lastrowid
    print(trans_id)
    if x.rowcount > 0:
        print("Successfully inserted transaction at canteen", canteen_name)
    else:
        print("Failed to insert transaction.")

    for product_id, amount in products.items():
        
        x.execute("INSERT INTO sold_items(stock_id, transaction_id, dos, amount, price) VALUES (%s, %s, %s, %s, %s)", (stock_id, trans_id, date_time, amount, price))

    
    conn.commit()

        


def scan():

    products = {}
    while True:

        try:

            scan_input = input("Scan ID (enter x to exit): ")

            if scan_input.lower() == 'x':

                break

            if not scan_input.isdigit():

                print("The ID must be a number. Please enter a valid ID.")
            else:

                if scan_input in products:

                    products[scan_input] += 1
                else:

                    products[scan_input] = 1
            
            print(products)

        except KeyboardInterrupt:

            print("\n")
    return products
   

def location():

    canteen_name = input("Enter Canteen: ").title()

    x.execute("SELECT id FROM canteens WHERE name = %s", (canteen_name,))
    result = x.fetchone()

    if result is None:
        
        print("Canteen name not found in the database, try again.")
        return location()
    else:

        canteen_id = result[0]
        return canteen_name, canteen_id


def employee():

    employee_name = input("Enter employee name: ")

    x.execute("SELECT id FROM employees WHERE name = %s", (employee_name,))
    result = x.fetchone()

    if result is None:

        print("Employee name not found in the database, try again.")
        return employee()
    else:

        employee_id = result[0]
        return employee_name, employee_id

if __name__ == "__main__":
    main()