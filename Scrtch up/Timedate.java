import java.time.LocalTime;
import java.time.LocalDate;
import java.time.format.DateTimeFormatter;

class Timedate {

    public String getCurrentTime() {
        LocalTime currentTime = LocalTime.now();
        int currentSecond = currentTime.getSecond();
        int roundedSecond = Math.floorMod(Math.round(currentSecond / 5.0f), 12) * 5;
        LocalTime roundedTime = LocalTime.of(currentTime.getHour(), currentTime.getMinute(), roundedSecond);

        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("HH:mm:ss");
        return roundedTime.format(formatter);
    }

    public String getCurrentDate() {
        LocalDate currentDate = LocalDate.now();
        DateTimeFormatter formatter = DateTimeFormatter.ofPattern("yyyy-MM-dd");
        return currentDate.format(formatter);
    }
}
