#!/bin/bash

for jsFile in "$@"
do
    simpleName=${jsFile:0:${#jsFile}-3} 
echo -e $simpleName
    # If the output file already exists, we don't want to double its size. Remove it.
    if [ -e "$simpleName.min.js" ]; then
      echo -e "Removing existing copy of $simpleName.min.js."
      rm "$simpleName.min.js"
    fi

    yui-compressor -o "$simpleName.min.js" "$simpleName.js"
    echo -e "Created $simpleName.min.js"
done

exit 0
