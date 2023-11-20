let db;
const dbName = "iTodo";
const dbVersion = "1";

const request = indexedDB.open(dbName, dbVersion);

request.onupgradeneeded = function (event) {
    db = event.target.result;

    const objectStore = db.createObjectStore("iItems",{keyPath: "id", autoIncrement: true});

    objectStore.createIndex("task", "task", {unique: false});
};

request.onsuccess = function (event) {
    db = event.target.result;
    console.log("db opened succsessfully");
};

request.onerror = function (event) {
    console.error("db error: " + event.target.errorCode);
};