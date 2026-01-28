<script>
import SongControls from "@/components/SongControls.vue";

const songs = [
  { id: 1, title: "Midnight Drive", artist: "Nova Skyline", album: "City Lights", year: 2021, genre: "Synthwave", durationSec: 214, bpm: 118, language: "en", coverUrl: "https://picsum.photos/seed/song1/400/400", audioUrl: "https://example.com/audio/song1.mp3" },
  { id: 2, title: "Tavaszi Szél", artist: "Kék Duna", album: "Hazafelé", year: 2019, genre: "Folk", durationSec: 187, bpm: 92, language: "hu", coverUrl: "https://picsum.photos/seed/song2/400/400", audioUrl: "https://example.com/audio/song2.mp3" },
  { id: 3, title: "Neon Rain", artist: "Luna Arcade", album: "After Hours", year: 2020, genre: "Electronic", durationSec: 201, bpm: 124, language: "en", coverUrl: "https://picsum.photos/seed/song3/400/400", audioUrl: "https://example.com/audio/song3.mp3" },
  { id: 4, title: "Körút", artist: "Panel Pop", album: "Budapest Nights", year: 2022, genre: "Pop", durationSec: 196, bpm: 110, language: "hu", coverUrl: "https://picsum.photos/seed/song4/400/400", audioUrl: "https://example.com/audio/song4.mp3" },
  { id: 5, title: "Ocean Breath", artist: "Amber Coast", album: "Tide Lines", year: 2018, genre: "Indie", durationSec: 229, bpm: 98, language: "en", coverUrl: "https://picsum.photos/seed/song5/400/400", audioUrl: "https://example.com/audio/song5.mp3" },
  { id: 6, title: "Night Market", artist: "Tokyo Tape", album: "Street Signals", year: 2023, genre: "Lo-fi", durationSec: 172, bpm: 80, language: "en", coverUrl: "https://picsum.photos/seed/song6/400/400", audioUrl: "https://example.com/audio/song6.mp3" },
  { id: 7, title: "Fények Közt", artist: "Aranyóra", album: "Percek", year: 2021, genre: "Alternative", durationSec: 210, bpm: 105, language: "hu", coverUrl: "https://picsum.photos/seed/song7/400/400", audioUrl: "https://example.com/audio/song7.mp3" },
  { id: 8, title: "Highline", artist: "Metro Bloom", album: "Concrete Garden", year: 2017, genre: "Rock", durationSec: 245, bpm: 132, language: "en", coverUrl: "https://picsum.photos/seed/song8/400/400", audioUrl: "https://example.com/audio/song8.mp3" },
  { id: 9, title: "Desert Lanterns", artist: "Saffron Echo", album: "Dunes", year: 2020, genre: "World", durationSec: 233, bpm: 104, language: "en", coverUrl: "https://picsum.photos/seed/song9/400/400", audioUrl: "https://example.com/audio/song9.mp3" },
  { id: 10, title: "Késő Este", artist: "Holdfény", album: "Csend", year: 2016, genre: "Jazz", durationSec: 261, bpm: 75, language: "hu", coverUrl: "https://picsum.photos/seed/song10/400/400", audioUrl: "https://example.com/audio/song10.mp3" },
  { id: 11, title: "Runaway Signals", artist: "Velvet Transit", album: "Frequency", year: 2022, genre: "Dance", durationSec: 203, bpm: 128, language: "en", coverUrl: "https://picsum.photos/seed/song11/400/400", audioUrl: "https://example.com/audio/song11.mp3" },
  { id: 12, title: "Hajnali Kávé", artist: "Szürke Vasárnap", album: "Reggel", year: 2019, genre: "Lo-fi", durationSec: 158, bpm: 78, language: "hu", coverUrl: "https://picsum.photos/seed/song12/400/400", audioUrl: "https://example.com/audio/song12.mp3" },
  { id: 13, title: "Silver Steps", artist: "Arctic Avenue", album: "Northbound", year: 2015, genre: "Indie", durationSec: 224, bpm: 100, language: "en", coverUrl: "https://picsum.photos/seed/song13/400/400", audioUrl: "https://example.com/audio/song13.mp3" },
  { id: 14, title: "Szikrák", artist: "Tűzijáték", album: "Lélegzet", year: 2023, genre: "Pop", durationSec: 190, bpm: 116, language: "hu", coverUrl: "https://picsum.photos/seed/song14/400/400", audioUrl: "https://example.com/audio/song14.mp3" },
  { id: 15, title: "Paper Planes", artist: "Sunday Cartography", album: "Folded Maps", year: 2018, genre: "Acoustic", durationSec: 212, bpm: 90, language: "en", coverUrl: "https://picsum.photos/seed/song15/400/400", audioUrl: "https://example.com/audio/song15.mp3" },
  { id: 16, title: "Bassline Therapy", artist: "Circuit Doctors", album: "Pulse Check", year: 2021, genre: "House", durationSec: 238, bpm: 126, language: "en", coverUrl: "https://picsum.photos/seed/song16/400/400", audioUrl: "https://example.com/audio/song16.mp3" },
  { id: 17, title: "Dombok Felett", artist: "Zöld Rét", album: "Kirándulás", year: 2017, genre: "Folk", durationSec: 205, bpm: 96, language: "hu", coverUrl: "https://picsum.photos/seed/song17/400/400", audioUrl: "https://example.com/audio/song17.mp3" },
  { id: 18, title: "Starlit Harbor", artist: "Calm Voyager", album: "Anchors", year: 2016, genre: "Ambient", durationSec: 301, bpm: 60, language: "en", coverUrl: "https://picsum.photos/seed/song18/400/400", audioUrl: "https://example.com/audio/song18.mp3" },
  { id: 19, title: "Ritmuskör", artist: "DobKör", album: "Ütem", year: 2020, genre: "Hip-Hop", durationSec: 198, bpm: 94, language: "hu", coverUrl: "https://picsum.photos/seed/song19/400/400", audioUrl: "https://example.com/audio/song19.mp3" },
  { id: 20, title: "Golden Hourglass", artist: "Mirage Mile", album: "Sundown Stories", year: 2024, genre: "R&B", durationSec: 216, bpm: 102, language: "en", coverUrl: "https://picsum.photos/seed/song20/400/400", audioUrl: "https://example.com/audio/song20.mp3" }
];
export default {
  name: 'App',
  components: {SongControls},
  data() {
    return {
      songs,
      query: "",
      selectedGenre: "",
      sortKey: "title",
      sortDir: 'asc',
      showFavoriteOnly: false,
      favorites: new Set(),
    }
  },
  computed: {
    genres() {
      const set = new Set(this.songs.map(s => s.genre).filter(Boolean));
      return Array.from(set).sort((a, b) => a.localeCompare(b));
    },
    filteredSongs() {
      const q = this.query.toLowerCase();
      return this.songs.filter(s => {
        const matchesText = !q || (s.title && s.title.toLowerCase().includes(q)) || (s.artist && s.artist.toLowerCase().includes(q)) || (s.album && s.album.toLowerCase().includes(q));
        const matchesGenre = !this.selectedGenre || s.genre === this.selectedGenre;
        const matchesFav = !this.showFavoriteOnly || this.favorites.has(s.id);
        return matchesText && matchesGenre && matchesFav;
      })
    },
    sortedSongs() {
      const dir = this.sortDir === 'asc' ? 1 : -1;
      const key = this.sortKey;

      return [...this.filteredSongs()].sort((a, b) => {
        const av = a[key];
        const bv = b[key];
        if (typeof av === "string" && typeof bv === "string") {
          return av.localeCompare(bv) * dir;
        }
        return ((av ?? 0) - (bv ?? 0) * dir)
      });
    }
  },
  methods: {
    toggleSortDir() {
      this.sortDir = this.sortDir === 'asc' ? 'desc' : 'asc';
    }
  }
}
</script>

<template>
  <div class="container">
    <SongControls :showFavoriteOnly="showFavoriteOnly" :sortDir="sortDir" :sortKey="sortKey" :genres="genres"
                  :selected-genre="selectedGenre" :query="query"
                  @update:query="query = $event" @update:selected-genre="selectedGenre = $event" @update:sort-key="sortKey = $event" @update:show-favorite-only="showFavoriteOnly = $event"
                  @toggleSortDir="toggleSortDir" />
  </div>
</template>

<style scoped></style>
