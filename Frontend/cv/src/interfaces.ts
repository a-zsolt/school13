export interface IProfile {
    fullName: string;
    position: string;
    street: string;
    cityPostal: string;
    dateBirth: string;
    nationality: string;
    phone: string;
    email: string;
    website?: string;
    summary: string;
    photoUrl: string;
}

export interface IExperience {
    fromTo: string;
    company: string;
    jobTitle: string;
    location: string;
    description: string;
    bullets?: string[];
}

export interface ICvData {
    profile: IProfile;
    experiences: IExperience[];
}