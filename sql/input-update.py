import pymysql
import time
from watchdog.observers import Observer
from watchdog.events import FileSystemEventHandler

conn = pymysql.connect(host= "localhost",
                       user="root",
                       passwd="root",
                       db="SHU_DATA",
                       charset='utf8')

x = conn.cursor()

try:
    while True:
        scan_input = input("Scan ID: ")

        query = "UPDATE stocks SET amount = amount - 1 WHERE product_id =  %s"

        x.execute(query, scan_input)

        conn.commit()

        print(x.rowcount, "records with ID", scan_input, "updated.")
except KeyboardInterrupt:
    print("\nProgram terminated by user")