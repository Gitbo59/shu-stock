import pymysql

conn = pymysql.connect(host= "localhost",
                       user="root",
                       passwd="root",
                       db="SHU_DATA",
                       charset='utf8')

x = conn.cursor()

canteen_id_map = {
    "Cantor": 1,
    "Adsetts": 2,
    "Aspect Court": 3,
    "Atrium": 4,
    "Charles Street": 5,
    "Owen": 6,
}

def main():
    try:
        canteen_name = input("Enter Canteen: ").title()
        scan(canteen_name)

    except KeyError:
        canteen_name = ""
        print("Invalid canteen name. Please enter a valid canteen name.")
        main()
        
    except KeyboardInterrupt:
        print("\nProgram terminated")


def scan(canteen_name):
    try:
        canteen_id = canteen_id_map[canteen_name]
    
    
        while True:
            scan_input = input("Scan ID: ")

            if not scan_input.isdigit():
                print("The ID must be a number. Please enter a valid ID.")
                scan(canteen_name)

            query = "UPDATE stocks SET amount = amount - 1 WHERE canteen_id = %s AND product_id =  %s"

            x.execute(query, (canteen_id, scan_input))

            conn.commit()
            if x.rowcount == 0:
                print("There are no records with that ID, try again")
            else:
                print(x.rowcount, "Updated", canteen_name, "stock level using ID", scan_input)

            
    except KeyboardInterrupt:
        print("\n")
        main()

if __name__ == "__main__":
    main()