const objtb = idb.open('laravel-pwa-demo', 1, db => {
    if (!db.objectStoreNames.contains('product')) db.createObjectStore('product');
});

class idbTable {
    constructor(table_name) {  // Constructor
        this.table_name = table_name;
    }
    
    getAll() {
        return objtb.then(db => {
          return db.transaction(this.table_name).objectStore(this.table_name).getAll();
        });
    }
    
    count() {
        return objtb.then(db => {
          return db.transaction(this.table_name).objectStore(this.table_name).count();
        });
    }
    
    set(key, val) {
        return objtb.then(db => {
            const tx = db.transaction(this.table_name, 'readwrite');
            tx.objectStore(this.table_name).put(val, key);
            
            return tx.complete;
        });
    }
    
    delete(key) {
        return objtb.then(db => {
            const tx = db.transaction(this.table_name, 'readwrite');
            tx.objectStore(this.table_name).delete(key);
            
            return tx.complete;
        });
    }
};

const saveProduct = function(product) {
    console.log('processing id ' + product.id);
    
    var params = JSON.stringify({
        name:product.name,
        category:product.category
    });
    
    fetch('/api/product', { method: 'POST', headers: { 'Content-Type':'application/json', 'Accept':'application/json' }, body: params }).then(function(response) {
        const contentType = response.headers.get("content-type");
        if (contentType && contentType.indexOf("application/json") !== -1) {
            response.json().then(function(res) {
                if (res.success == true) {
                    console.log('deleting id ' + product.id);
                    (new idbTable('product')).delete(product.id);
                }
            });
        } else {
            console.log("response not json")
        }
    }).catch(function(err) {
        console.log("error " + err);
    });
}
