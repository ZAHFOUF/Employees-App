import requests
from bs4 import BeautifulSoup
import csv
import sys


# Replace this with the URL of the Amazon search results page for the product you want to scrape
# Get the input text from the command-line arguments
if len(sys.argv) > 1:
    user_text = ' '.join(sys.argv[1:])
else:
    print("Please provide some input text as a command-line argument.")
    exit()

url = f'https://www.amazon.com/s?k={user_text}'


# Set the user-agent header to avoid getting blocked by Amazon
headers = {'Content-Type':'text/plain;charset=UTF-8','User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36'}

# Send a GET request to the URL with the user-agent header
response = requests.get(url, headers=headers)

# Parse the HTML response with BeautifulSoup
soup = BeautifulSoup(response.content, 'html.parser')

# Find all the product items on the page
products = soup.find_all('div', {'data-component-type': 's-search-result'})

# Open a CSV file for writing
with open('amazon_products.csv', 'w', newline='', encoding='utf-8') as csvfile:
    # Create a CSV writer object
    writer = csv.writer(csvfile)

    # Write the header row to the CSV file
    writer.writerow(['Title', 'Price', 'Rating'])

    # Loop through each product item and extract the data
    for product in products:
        # Extract the product title
        title_elem = product.find('h2', {'class': 'a-size-mini'})
        if title_elem is None:
            title_elem = product.find('h2', {'class': 'a-size-base'})
        title = title_elem.text.strip()

        # Extract the product price
        price_elem = product.find('span', {'class': 'a-price-whole'})
        if price_elem is None:
            price_elem = product.find('span', {'class': 'a-offscreen'})
        if price_elem is not None:
            price = price_elem.text.strip()
        else:
            price = 'N/A'

        # Extract the product rating
        rating_elem = product.find('span', {'class': 'a-icon-alt'})
        if rating_elem is not None:
            rating = rating_elem.text.strip().split()[0]
        else:
            rating = 'N/A'

        # Write the data to the CSV file
        writer.writerow([title, price, rating])

# Print a message to indicate that the scraping is complete
print('Scraping complete!',response.status_code,csvfile)

