<script>
    document.addEventListener("DOMContentLoaded", function () {
        // الحصول على رابط الصفحة الحالي
        const currentPath = window.location.pathname;

        // البحث عن جميع العناصر <a> داخل القوائم الفرعية
        const menuItems = document.querySelectorAll(".sub-menu a");

        menuItems.forEach(item => {
            // إذا تطابق الرابط الحالي مع href للعنصر
            if (currentPath.includes(item.getAttribute("href"))) {
                // إضافة الكلاس "show" لفتح القائمة
                const submenu = item.closest(".sub-menu");
                if (submenu) {
                    submenu.classList.add("show");
                }

                // تحديث خاصية aria-expanded الخاصة بالعناصر الرئيسية
                const parentLi = item.closest("li");
                if (parentLi) {
                    parentLi.setAttribute("aria-expanded", "true");
                }
            }
        });
    });
 
</script>
