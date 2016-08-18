blog
===================================


A Symfony project created on August 1, 2016, 8:49 pm.

**Blogda şuan yazıları ayrıntılı olarak görüntüleyebilir, 
arama yapabilir, kategorilere tıklayarak o kategoriye ait yazıları okuyabilirsiniz**

**`Admin yetkileri`**

- post ekleme,
- yeni kategori oluşturabilme,
- düzenleme, silme vs bütün işlemler yapılabilecektir.

**`Üye yetkileri`**

- post arama ve yazıları kategorilerle görüntüleyebilme,
- yorum yapabilme yetkilerine sahip olacaktır.

app/config/config.yml içinde username yerine yazılan kullanıcı adına göre
hangi kullanıcının blog sahibi olduğunu belirleyebilirsiniz. Yani kendi kullanıcı adınızı
buraya yazarak kolayca yönetimi ele alabilirsiniz. default değer **msaygili** :)

twig:
    globals:
        blog_admin: "username"
        
        
        
**yorum yapma sistemi ve düzenleme,silme işlemleri eklenecektir..**