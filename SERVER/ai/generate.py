import sys
import nltk
import random
from nltk.corpus import wordnet

# Get the input text from the command-line arguments
if len(sys.argv) > 1:
    user_text = ' '.join(sys.argv[1:])
else:
    print("Please provide some input text as a command-line argument.")
    exit()

# Tokenize the user input into words
words = nltk.word_tokenize(user_text)

# Generate random synonyms for each word in the input text
new_words = []
for word in words:
    # Get the part of speech of the current word
    pos = nltk.pos_tag([word])[0][1][0].lower()
    try:
        # Generate a random synonym for the current word
        synsets = wordnet.synsets(word, pos=pos)
        if synsets:
            new_word = random.choice(synsets).lemmas()[0].name()
            new_words.append(new_word)
        else:
            new_words.append(word)
    except KeyError:
        # Use a default part of speech tag if the original tag is not recognized
        synsets = wordnet.synsets(word, pos='n')
        if synsets:
            new_word = random.choice(synsets).lemmas()[0].name()
            new_words.append(new_word)
        else:
            new_words.append(word)

# Join the new words together into a new text
new_text = ' '.join(new_words)

# Print the new text
print(new_text)
