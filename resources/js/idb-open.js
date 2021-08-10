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
    
    set(key, val) {
        return objtb.then(db => {
            const tx = db.transaction(this.table_name, 'readwrite');
            tx.objectStore(this.table_name).put(val, key);
            
            return tx.complete;
        });
    }
};

const saveProduct = function(product) {
    console.log('processing id ' + product.id);
    
    var params = JSON.stringify({
        id:product.id,
        name:product.name,
        category:product.category
    });
    
    fetch('/post.php', { method: 'POST', headers: { 'Content-Type':'application/json', 'Accept':'application/json' }, body: params }).then(function(response) {
        response.text().then(function(res) {
            if (res == "oke") {
                console.log('deleting id ' + product.id);
                (new idbTable('product')).delete(product.id);
            }
        });
    }).catch(function(err) {
        console.log("error " + err);
    });
}
