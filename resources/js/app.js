// Подключение JavaScript Bootstrap (нужен для tooltips)
import * as bootstrap from 'bootstrap';

// Включение tooltips после загрузки страницы
document.addEventListener('DOMContentLoaded', () => {
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el));
});