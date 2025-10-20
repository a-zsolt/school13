import sum , { PI, circleArea } from "../modules/math.js";
import { formatDate } from "../modules/formatDate.js";
import renderCard from "../modules/ui/renderCard.js";

export function renderHome() {
    const container = document.createElement('section')
    
    const intro =document.createElement('p')
    intro.textContent = `Betöltve: ${formatDate()} - A PI értéke ${PI}, két szám összege: 5+5=${sum(5, 5)}, - a kör(3)=${circleArea(3).toFixed(2)}`

    container.appendChild(intro)
    container.appendChild(renderCard({
        title: 'A modulok működnek!',
        body: 'Ez a kártya egy külön modul eredménye.'
    }))
    
    return container;
}