<script>
document.addEventListener("DOMContentLoaded", function () {
    const contactLink = document.querySelector("nav a[href='#contact']");
    const contactSection = document.getElementById("contact");

    contactLink.addEventListener("click", function (e) {
        e.preventDefault();
        contactSection.scrollIntoView({ behavior: "smooth" });
    });
});
</script>


