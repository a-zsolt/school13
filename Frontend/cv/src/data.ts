import type { ICvData } from "./interfaces.ts";

export const cvData: ICvData = {
    profile: {
        fullName: "Teszt Erika",
        position: "Developer",
        street: "Bécsi út 123",
        cityPostal: "Budaőest 1032",
        dateBirth: "1990.01.01.",
        nationality: "Hungarian",
        phone: "+36201234567",
        email:"erika@teszt.hu",
        website: "www.teszt.erika.hu",
        summary: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc finibus imperdiet euismod. Nullam vehicula nibh facilisis congue ultricies. Sed accumsan ligula massa, vel faucibus mi sollicitudin sit amet. Fusce sed felis vel dolor volutpat imperdiet in ut sem. Proin sit amet condimentum mauris. Vestibulum eget molestie lectus, et rutrum nibh.",
        photoUrl: "https://images.pexels.com/photos/733872/pexels-photo-733872.jpeg?auto=compress&cs=tinysrgb&w=300%22"
    },
    experiences: [
        {
            fromTo: "2022 - Currently",
            company: "Első cég kft.",
            jobTitle: "Frontend Developer",
            location: "Budapest",
            description: "Web application developement using TypeScript and React.",
            bullets: [
                "Responsive web development",
                "Agile development",
                "Code quality development",
                "Vibe coding"
            ]
        },
        {
            fromTo: "2019 - 2022",
            company: "Második cég kft.",
            jobTitle: "Web Developer",
            location: "Budapest",
            description: "Web application developement",
            bullets: [
                "Responsive web development",
                "Agile development",
                "WordPress development"
            ]
        }
    ]
}