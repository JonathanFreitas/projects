#!/bin/bash


SAVE_DIR="/home/lenovo/Music/Download"
WORK_DIR="/home/lenovo/MusicDownload"


# Loop para baixar cada musica

while IFS= read -r MUSICA; do
  cd $SAVE_DIR
  echo "baixando $MUSICA"
  yt-dlp -x --audio-format mp3 --audio-quality 1 $MUSICA
  echo "Finalizado $MUSICA"
  cd $WORK_DIR
	
done < "lista_musicas.txt"
