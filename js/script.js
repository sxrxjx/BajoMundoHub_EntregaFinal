// AQUÍ SE REÚNE TODO EL CÓDIGO DISEÑADO EN JAVASCRIPT PARA EL FUNCIONAMIENTO DE ALGUNOS COMPONENTES.

document.addEventListener("DOMContentLoaded", () => {


    // -----------CONTADOR-------------
    //  de la página de inicio. Detectamos el atributo personalizado que añadimos al index (data-fecha-evento).
    let countdown = document.querySelector("#countdown p");
    let countdownContainer = document.getElementById("countdown");

    if (countdown && countdownContainer) {
        let targetDateStr = countdownContainer.getAttribute("data-fecha-evento");

        function updateCountdown() {
            // Esta función sirve para actualizar el contador cada 1000 milisegundos.creamos un objeto de fecha con la fecha que devuelve el atributo personalizado desde la base de datos. La T separa la fecha de la hora, para más compatibilidad. El .getTime() nos devuelve los milisegundos desde 1970, así conseguimos un número con el que poder operar.
            let eventDate = new Date(targetDateStr.includes("T") ? targetDateStr : targetDateStr + "T00:00:00").getTime();
            let now = new Date().getTime();
            let diff = eventDate - now;

            // este condicional sirve para comprobar si ya ha pasado la fecha del evento y actualizar el contador a 00:00:00 si es así. Además, detiene el contador y sale de la función de forma que no se ejecuta tontamente en segundo plano.
            if (diff <= 0) {
                countdown.textContent = "00:00:00";
                clearInterval(timer);
                return;
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
            let minutes = Math.floor((diff / (1000 * 60)) % 60);

            // Pintamos el resultado con text.content.
            countdown.textContent =
                `${String(days).padStart(2, "0")}:` +
                `${String(hours).padStart(2, "0")}:` +
                `${String(minutes).padStart(2, "0")}`;
        }

        updateCountdown();
        let timer = setInterval(updateCountdown, 1000);
    }



    // -------NAVBAR OSCURECIDO CON EL SCROLL---------
    //  Si se detecta que se ha scrolleado, se añade una clase 'scrolled' al objeto navbar.
    let navbar = document.querySelector(".navbar");

    if (navbar) {
        window.addEventListener("scroll", function () {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    }


    // -------FORMULARIO DE SUSCRIPCIÓN---------
    // Se manda un alert con un mensaje u otro dependiendo de si el email es válido o no, y vaciamos el campo de texto. Se ha hecho de forma provisional.
    let form = document.querySelector("form");
    let emailInput = document.getElementById("exampleInputEmail1");

    if (form && emailInput) {
        form.addEventListener("submit", (e) => {
            e.preventDefault();

            if (emailInput.value.includes("@")) {
                alert("¡Suscripción correcta!");
                emailInput.value = "";
            } else {
                alert("Email inválido");
            }
        });
    }


    // -------FILTRO DEL GLOSARIO CON BOTONES--------- 
    // Este es el mecanismo para la sección del glosario de la página about.
    let filterButtons = document.querySelectorAll('.btn-letter');
    let cards = document.querySelectorAll('.glossary-card');
    let emptyState = document.getElementById('glossary-empty-state');

    // Este condicional filtra los elementos según el atributo data-letter y muestra un mensaje si no hay elementos.
    if (filterButtons.length > 0 && cards.length > 0 && emptyState) {

        let filterGlossary = (letter) => {
            let visibleCount = 0;
            cards.forEach(card => {
                let cardLetter = card.getAttribute('data-letter');
                if (letter === 'all' || cardLetter === letter) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                emptyState.style.display = 'block';
                emptyState.querySelector('.empty-letter').textContent = letter.toUpperCase();
            } else {
                emptyState.style.display = 'none';
            }
        };


        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                filterButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                let letter = button.getAttribute('data-letter');
                filterGlossary(letter);
            });
        });


        filterGlossary('a');
    }


    // ------ CALENDARIO ------- 
    let ctaEventos = document.getElementById("CTA-eventos");
    if (ctaEventos) {
        ctaEventos.addEventListener("click", () => {
            alert("¡Próximamente información!");
        });
    }


    let prevMonthBtn = document.getElementById("prevMonth");
    let nextMonthBtn = document.getElementById("nextMonth");
    let calendarGrid = document.getElementById("calendarGrid");
    let currentMonthYear = document.getElementById("currentMonthYear");

    if (calendarGrid && currentMonthYear) {
        let currentDate = new Date();


        let upcomingEvents = [];
        let eventElements = document.querySelectorAll("#upcoming-events-data .event-item");
        for (let i = 0; i < eventElements.length; i++) {
            upcomingEvents.push({
                fecha: eventElements[i].getAttribute("data-fecha"),
                titulo: eventElements[i].getAttribute("data-titulo"),
                descripcion_corta: eventElements[i].getAttribute("data-descripcion"),
                miniatura: eventElements[i].getAttribute("data-miniatura")
            });
        }

        let monthsES = [
            "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
        ];

        function renderCalendar(date) {
            let year = date.getFullYear();
            let month = date.getMonth();

            currentMonthYear.textContent = `${monthsES[month]} ${year}`;

            let firstDay = new Date(year, month, 1).getDay();
            let daysInMonth = new Date(year, month + 1, 0).getDate();

            let adjustedFirstDay;
            if (firstDay === 0) {
                adjustedFirstDay = 6;
            } else {
                adjustedFirstDay = firstDay - 1;
            }

            let html = `
                <span>Lu</span><span>Ma</span><span>Mi</span><span>Ju</span><span>Vi</span><span>Sá</span><span>Do</span>
            `;

            for (let i = 0; i < adjustedFirstDay; i++) {
                html += `<span></span>`;
            }

            for (let day = 1; day <= daysInMonth; day++) {
                let hasEvent = false;
                for (let j = 0; j < upcomingEvents.length; j++) {
                    let event = upcomingEvents[j];
                    let parts = event.fecha.split('-');
                    let eYear = parseInt(parts[0], 10);
                    let eMonth = parseInt(parts[1], 10);
                    let eDay = parseInt(parts[2], 10);
                    if (eYear === year && (eMonth - 1) === month && eDay === day) {
                        hasEvent = true;
                        break;
                    }
                }

                let classAttr = "";
                if (hasEvent) {
                    classAttr = 'class="special-day"';
                }

                html += `
                    <span ${classAttr} data-day="${day}">
                        ${day}
                    </span>
                `;
            }

            function addHoverEvents() {
                let specialDays = document.querySelectorAll(".special-day");
                if (specialDays.length === 0) return;

                let tooltip;

                for (let i = 0; i < specialDays.length; i++) {
                    let specialDay = specialDays[i];
                    specialDay.addEventListener("mouseenter", (e) => {
                        let day = parseInt(specialDay.getAttribute("data-day"), 10);
                        let event = null;
                        for (let j = 0; j < upcomingEvents.length; j++) {
                            let ev = upcomingEvents[j];
                            let parts = ev.fecha.split('-');
                            let eYear = parseInt(parts[0], 10);
                            let eMonth = parseInt(parts[1], 10);
                            let eDay = parseInt(parts[2], 10);
                            if (eYear === year && (eMonth - 1) === month && eDay === day) {
                                event = ev;
                                break;
                            }
                        }

                        if (!event) return;

                        tooltip = document.createElement("div");
                        tooltip.classList.add("event-tooltip");

                        tooltip.innerHTML = `
                            <img src="${event.miniatura}" alt="${event.titulo}">
                            <div class="tooltip-content">
                                <h4>${event.titulo}</h4>
                                <p>${event.descripcion_corta}</p>
                            </div>
                        `;

                        tooltip.style.position = "absolute";
                        tooltip.style.zIndex = "9999";

                        document.body.appendChild(tooltip);

                        let rect = specialDay.getBoundingClientRect();
                        tooltip.style.top = (window.scrollY + rect.top - 10) + "px";
                        tooltip.style.left = (window.scrollX + rect.right + 10) + "px";
                    });

                    specialDay.addEventListener("mousemove", (e) => {
                        if (tooltip) {
                            tooltip.style.top = (e.pageY - 10) + "px";
                            tooltip.style.left = (e.pageX + 15) + "px";
                        }
                    });

                    specialDay.addEventListener("mouseleave", () => {
                        if (tooltip) {
                            tooltip.remove();
                            tooltip = null;
                        }
                    });
                }
            }

            calendarGrid.innerHTML = html;
            addHoverEvents();
        }

        if (prevMonthBtn) {
            prevMonthBtn.addEventListener("click", () => {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar(currentDate);
            });
        }

        if (nextMonthBtn) {
            nextMonthBtn.addEventListener("click", () => {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar(currentDate);
            });
        }

        renderCalendar(currentDate);
    }


    let yearButtons = document.querySelectorAll(".year-btn");
    if (yearButtons.length > 0) {
        yearButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                yearButtons.forEach(b => {
                    b.classList.remove("btn-active");
                    b.classList.add("btn-submenu");
                });

                btn.classList.add("btn-active");

                let year = btn.dataset.year;

                let container = document.getElementById("past-events-container");

                if (container) {
                    container.style.opacity = "0.7";

                    setTimeout(() => {
                        container.style.opacity = "1";
                    }, 200);
                }

                alert("Año seleccionado: " + year);
            });
        });
    }


    // ------ MANIFIESTO: ELEMENTOS DECORATIVOS DRAG AND DROP------- 
    let manifestDecoratives = document.querySelectorAll(
        '.manifiesto-decor-left, .manifiesto-decor-right, .manifiesto-decor-center'
    );

    manifestDecoratives.forEach(element => {
        let isDragging = false;
        let startX, startY;
        let offsetX = 0;
        let offsetY = 0;

        const dragStart = (e) => {
            let clientX = e.type === 'touchstart' ? e.touches[0].clientX : e.clientX;
            let clientY = e.type === 'touchstart' ? e.touches[0].clientY : e.clientY;

            isDragging = true;
            startX = clientX - offsetX;
            startY = clientY - offsetY;


            element.style.transition = 'none';


            let transformPrefix = '';
            if (element.classList.contains('manifiesto-decor-left')) {
                transformPrefix = 'rotate(15deg) ';
            } else if (element.classList.contains('manifiesto-decor-right')) {
                transformPrefix = 'rotate(-15deg) ';
            } else if (element.classList.contains('manifiesto-decor-center')) {
                transformPrefix = 'translateX(-50%) ';
            }
            element.style.transform = `${transformPrefix}translate(${offsetX}px, ${offsetY}px) scale(1.05)`;

            if (e.type === 'mousedown') {
                e.preventDefault();
            }
        };

        let dragMove = (e) => {
            if (!isDragging) return;


            if (e.type === 'touchmove') {
                e.preventDefault();
            }

            let clientX = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
            let clientY = e.type === 'touchmove' ? e.touches[0].clientY : e.clientY;

            offsetX = clientX - startX;
            offsetY = clientY - startY;


            let transformPrefix = '';
            if (element.classList.contains('manifiesto-decor-left')) {
                transformPrefix = 'rotate(15deg) ';
            } else if (element.classList.contains('manifiesto-decor-right')) {
                transformPrefix = 'rotate(-15deg) ';
            } else if (element.classList.contains('manifiesto-decor-center')) {
                transformPrefix = 'translateX(-50%) ';
            }

            element.style.transform = `${transformPrefix}translate(${offsetX}px, ${offsetY}px) scale(1.05)`;
        };

        let dragEnd = () => {
            if (!isDragging) return;
            isDragging = false;


            element.style.transition = 'opacity 0.3s ease, transform 0.3s ease, filter 0.3s ease';


            let transformPrefix = '';
            if (element.classList.contains('manifiesto-decor-left')) {
                transformPrefix = 'rotate(15deg) ';
            } else if (element.classList.contains('manifiesto-decor-right')) {
                transformPrefix = 'rotate(-15deg) ';
            } else if (element.classList.contains('manifiesto-decor-center')) {
                transformPrefix = 'translateX(-50%) ';
            }
            element.style.transform = `${transformPrefix}translate(${offsetX}px, ${offsetY}px)`;
        };


        element.addEventListener('mousedown', dragStart);
        document.addEventListener('mousemove', dragMove);
        document.addEventListener('mouseup', dragEnd);


        element.addEventListener('touchstart', dragStart, { passive: true });
        document.addEventListener('touchmove', dragMove, { passive: false });
        document.addEventListener('touchend', dragEnd);
    });

    // ---------------CARRUSELES DE GALERÍA------------------
    let galleryCarousels = document.querySelectorAll('.gallery-carousel');
    galleryCarousels.forEach(carousel => {
        let items = carousel.querySelectorAll('.carousel-item');

        function updateStackClasses(activeItem) {
            items.forEach(item => {
                let classesToRemove = Array.from(item.classList).filter(c => c.startsWith('stack-'));
                classesToRemove.forEach(c => item.classList.remove(c));
            });

            if (!activeItem) return;

            let itemsArray = Array.from(items);
            let activeIndex = itemsArray.indexOf(activeItem);
            if (activeIndex === -1) return;

            let n = itemsArray.length;
            for (let offset = 1; offset < n; offset++) {
                const index = (activeIndex + offset) % n;
                itemsArray[index].classList.add(`stack-${offset}`);
            }
        }


        let initialActive = carousel.querySelector('.carousel-item.active');
        if (initialActive) {
            updateStackClasses(initialActive);
        }


        carousel.addEventListener('slide.bs.carousel', (e) => {
            updateStackClasses(e.relatedTarget);
        });
    });

    // ---------------- CABIAR FOTO DE PERFIL DEL PERFIL.PHP------------------
    let avatarWrapper = document.querySelector(".perfil-avatar-preview-wrapper");
    let avatarInput = document.getElementById("avatar-file-input");

    if (avatarWrapper && avatarInput) {
        avatarWrapper.addEventListener("click", () => {
            avatarInput.click();
        });

        avatarInput.addEventListener("change", (e) => {
            let reader = new FileReader();
            reader.onload = function () {
                let preview = document.getElementById('avatar-img-preview');
                if (preview) {
                    preview.src = reader.result;
                }
            };
            if (e.target.files[0]) {
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    }
});