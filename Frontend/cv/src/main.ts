import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

import './style.css';
import type {IExperience, IProfile} from "./interfaces.ts";
import { cvData } from "./data.ts";

function createBulletsHTML(bullets?: string[]): string {
    if (!bullets || bullets.length === 0) return '';

    return `
                <ul class="list-group ">
                                ${bullets.map((b) => `<li class="list-group-item">${b}</li>`).join("")}
                </ul>
            `;
}

function createExperienceHTML(exp: IExperience): string {
    return `
        <section class="mb-4">
            <div class="d-flex justify-content-between small fw-semibold text-muted">
                <span>${exp.fromTo}</span>
                <span>${exp.location}</span>
            </div>
            <div class="fw-semibold">${exp.jobTitle} - ${exp.company}</div>
            <p class="cv-experience-desc mb-1">${exp.description}</p>
            ${createBulletsHTML(exp.bullets)}
        </section>
    `;
}

function createExperienceListHTML(experiences: IExperience[]): string {
    return experiences.map(createExperienceHTML).join("");
}

function createProfileFieldHTML(lable: string, value?: string|null): string {
    if (!value) return '';

    return `
        <div class="mb-2">
            <div class="text-uppercase small fw-bold">${lable}</div>
            <div class="small">${value}</div>
        </div>
    `
}

function createSideBarHTML(profile: IProfile): string {
    if(!profile) return '';

    return ` 
        <aside class="col-md-4 bg-sidebar p-4">
            <div class="d-flex justify-content-center mb-4">
                <div class="cv-photo">
                    <img src="${profile.photoUrl}" alt="${profile.fullName}" class="img-fluid">
                </div>
            </div>
            <h2 class="h6 text-uppercase fw-bold border-bottom pb-2 mb-3">Profile</h2>
            ${createProfileFieldHTML("Sreet Name", profile.street)}
            ${createProfileFieldHTML("Postal Code / City Name", profile.cityPostal)}
            ${createProfileFieldHTML("Birth Date", profile.dateBirth)}
            ${createProfileFieldHTML("Nationality", profile.nationality)}
            ${createProfileFieldHTML("Phone number", profile.phone)}
            ${createProfileFieldHTML("Email", profile.email)}
            ${profile.website? createProfileFieldHTML(profile.website) : ""}
            <p class="cv-sum">${profile.summary}</p>
        </aside>
    `;
}

function createMainContentHTML(profile: IProfile, experiences: IExperience[]): string {
    if (!profile || ! experiences || experiences.length == 0 ) return '';

    return `
        <main class="col-md-8 bg-white p-4">
            <div class="mb-3">
                <div class="cv-name fw-bold text-uppercase">${profile.fullName}</div>
                <div class="cv-position text-muted">${profile.position}</div>
            </div>
            <h3 class="cv-section-title mb-3">Professional Experiance</h3>
            ${createExperienceListHTML(experiences)}
        </main>
    `;
}

function createLayoutHTML(){
    const { profile, experiences } = cvData;

    return `
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row gap-0 shadow rounded overflow-hidden">
                        ${createSideBarHTML(profile)}
                        ${createMainContentHTML(profile, experiences)}
                    </div>  
                </div>
            </div>
        </div>
    `;
}

function renderCv(rootId: string = "cv-root"): void{
    const root = document.getElementById(rootId);
    if (!root) return;

    root.innerHTML = createLayoutHTML();

}
renderCv();
