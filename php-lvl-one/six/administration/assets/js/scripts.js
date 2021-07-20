const AREA__POPUP = document.querySelector(".pop_up");
document.querySelectorAll(".td__link--dell a").forEach(item => {
    item.addEventListener("click", () => {
        let idLink = item.dataset.id;
        AREA__POPUP.innerHTML = `<div class="background">
            <div class="skip_wall">
                <div class="skip_wall__text">Вы точно уверены, что хотите удалить товар?</div>
                <div class="skip_wall__buttons">
                    <div class="skip_wall--No">Нет</div>
                    <div class="skip_wall--Yes">Да</div>
                </div>
            </div>
        </div>`;
        document.querySelector('.skip_wall--No').addEventListener("click", () => {
            AREA__POPUP.innerHTML = "";
        });
        document.querySelector('.skip_wall--Yes').addEventListener("click", () => {
            window.location.href = "admin-panel.php?page=admin-panel--dell&id_product=" + idLink;
        });
    });
});