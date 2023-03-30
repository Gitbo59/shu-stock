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


class FileChangeHandler(FileSystemEventHandler):
    def on_modified(self, event):
        if event.is_directory:
            return
        self.save_file()
        with open('prodid.txt') as f:
            for line in f:
                pass
            last_line = line

        query = "UPDATE stocks SET amount = amount - 1 WHERE product_id =  %s"


        x.execute(query, last_line)


        conn.commit()

        print(x.rowcount, "records with ID", input, "updated.")

if __name__ == "__main__":
    path = "prodid.txt"
    event_handler = FileChangeHandler()
    observer = Observer()
    observer.schedule(event_handler, path, recursive=False)
    observer.start()
    try:
        while True:
            pass
    except KeyboardInterrupt:
        observer.stop()
    observer.join()



