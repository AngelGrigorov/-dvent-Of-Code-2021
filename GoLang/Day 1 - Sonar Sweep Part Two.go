package main

import (
	"bufio"
	"fmt"
	"os"
	"strconv"
)

func main() {
	file, _ := os.Open("dayOneInput.txt")
	defer file.Close()
	scanner := bufio.NewScanner(file)
	count := 0
	lastDepthMeasurement := 0
	var allDepthMeasurements []int
	var summedDepthMeasurements []int
	for scanner.Scan() {
		depthMeasurement, _ := strconv.Atoi(scanner.Text())
		allDepthMeasurements = append(allDepthMeasurements, depthMeasurement)
	}
	for i := 0; i < len(allDepthMeasurements)-2; i++ {
		summedDepthMeasurements = append(summedDepthMeasurements, allDepthMeasurements[i]+allDepthMeasurements[i+1]+allDepthMeasurements[i+2])
	}
	for j := 0; j < len(summedDepthMeasurements); j++ {
		if lastDepthMeasurement != 0 && summedDepthMeasurements[j] > lastDepthMeasurement {
			count++
		}
		lastDepthMeasurement = summedDepthMeasurements[j]
	}
	fmt.Println(count)
}
